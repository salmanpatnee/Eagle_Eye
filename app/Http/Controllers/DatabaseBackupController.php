<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

class DatabaseBackupController extends Controller
{
    public function download()
    {
        set_time_limit(0);

        $cfg = config('database.connections.mysql');

        $host = ($cfg['host'] ?? '127.0.0.1') === 'localhost' ? '127.0.0.1' : ($cfg['host'] ?? '127.0.0.1');
        $port = $cfg['port'] ?? '3306';
        $database = $cfg['database'] ?? '';
        $username = $cfg['username'] ?? '';
        $password = $cfg['password'] ?? '';
        $socket = $cfg['unix_socket'] ?? '';

        $filename = 'eagle_eye_backup_'.now()->format('Y-m-d').'.sql';
        $outputPath = storage_path('app/'.$filename);
        $mysqldump = config('database.mysqldump_path', 'mysqldump');

        // Write temp options file so password never appears in process list or env
        $optionsFile = storage_path('app/.mysqldump_tmp.cnf');
        file_put_contents($optionsFile, "[client]\npassword=".str_replace('"', '\\"', $password)."\n");
        chmod($optionsFile, 0600);

        try {
            $cmd = $socket
                ? sprintf(
                    '%s --defaults-extra-file=%s --socket=%s -u %s --single-transaction --routines --triggers %s',
                    escapeshellarg($mysqldump),
                    escapeshellarg($optionsFile),
                    escapeshellarg($socket),
                    escapeshellarg($username),
                    escapeshellarg($database)
                )
                : sprintf(
                    '%s --defaults-extra-file=%s -h %s -P %s -u %s --single-transaction --routines --triggers %s',
                    escapeshellarg($mysqldump),
                    escapeshellarg($optionsFile),
                    escapeshellarg($host),
                    escapeshellarg((string) $port),
                    escapeshellarg($username),
                    escapeshellarg($database)
                );

            $descriptors = [
                0 => ['pipe', 'r'],
                1 => ['file', $outputPath, 'w'],
                2 => ['pipe', 'w'],
            ];

            $process = proc_open($cmd, $descriptors, $pipes);

            if (! is_resource($process)) {
                abort(Response::HTTP_INTERNAL_SERVER_ERROR, 'Could not start mysqldump process.');
            }

            fclose($pipes[0]);
            $stderr = stream_get_contents($pipes[2]);
            fclose($pipes[2]);
            $exitCode = proc_close($process);
        } finally {
            if (file_exists($optionsFile)) {
                unlink($optionsFile);
            }
        }

        if ($exitCode !== 0) {
            if (file_exists($outputPath)) {
                unlink($outputPath);
            }
            abort(Response::HTTP_INTERNAL_SERVER_ERROR, 'mysqldump failed: '.$stderr);
        }

        return response()
            ->download($outputPath, $filename, ['Content-Type' => 'application/octet-stream'])
            ->deleteFileAfterSend(true);
    }
}
