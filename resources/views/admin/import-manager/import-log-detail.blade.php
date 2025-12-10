@extends('layouts.app')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center mb-6">
        <div class="sm:flex-auto">
            <h1 class="text-2xl font-semibold leading-6 text-gray-900">Import Job #{{ $job->id }}</h1>
            <p class="mt-2 text-sm text-gray-700">Detailed information about this import job.</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{ route('imports.history') }}" class="block rounded-md bg-gray-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-500">
                Back to History
            </a>
        </div>
    </div>

    <div class="space-y-6">
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Job Information</h3>
                <div class="mt-5 border-t border-gray-200">
                    <dl class="divide-y divide-gray-200">
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">File Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $job->file_name }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Import Mapping</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $job->mapping->name ?? 'N/A' }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Uploaded By</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $job->user->name ?? 'Unknown' }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">
                                @if($job->status === 'completed')
                                    <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Completed</span>
                                @elseif($job->status === 'processing')
                                    <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-600/20">Processing</span>
                                @elseif($job->status === 'failed')
                                    <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">Failed</span>
                                @else
                                    <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">{{ ucfirst($job->status) }}</span>
                                @endif
                            </dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Started At</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $job->started_at ? $job->started_at->format('Y-m-d H:i:s') : 'N/A' }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Completed At</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $job->completed_at ? $job->completed_at->format('Y-m-d H:i:s') : 'N/A' }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900 mb-4">Statistics</h3>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-5">
                    <div class="bg-gray-50 px-4 py-5 sm:p-6 rounded-lg">
                        <dt class="text-sm font-medium text-gray-500">Total Rows</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $job->total_rows }}</dd>
                    </div>
                    <div class="bg-blue-50 px-4 py-5 sm:p-6 rounded-lg">
                        <dt class="text-sm font-medium text-blue-800">Valid Rows</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-blue-900">{{ $job->valid_rows }}</dd>
                    </div>
                    <div class="bg-green-50 px-4 py-5 sm:p-6 rounded-lg">
                        <dt class="text-sm font-medium text-green-800">Inserted</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-green-900">{{ $job->inserted_rows }}</dd>
                    </div>
                    <div class="bg-yellow-50 px-4 py-5 sm:p-6 rounded-lg">
                        <dt class="text-sm font-medium text-yellow-800">Skipped</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-yellow-900">{{ $job->skipped_rows }}</dd>
                    </div>
                    <div class="bg-red-50 px-4 py-5 sm:p-6 rounded-lg">
                        <dt class="text-sm font-medium text-red-800">Errors</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-red-900">{{ $job->error_rows }}</dd>
                    </div>
                </div>
            </div>
        </div>

        @if($job->errors && count($job->errors) > 0)
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900 mb-4">Error Details</h3>
                <div class="overflow-hidden bg-red-50 rounded-lg">
                    <div class="max-h-96 overflow-y-auto">
                        <table class="min-w-full divide-y divide-red-200">
                            <thead class="bg-red-100">
                                <tr>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-red-900 uppercase tracking-wider">Row</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-red-900 uppercase tracking-wider">Error</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-red-900 uppercase tracking-wider">Data</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-red-200">
                                @foreach($job->errors as $error)
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-red-900">
                                        {{ $error['row'] ?? 'N/A' }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-red-800">
                                        {{ $error['error'] ?? 'Unknown error' }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-red-700">
                                        @if(isset($error['data']))
                                            {{ json_encode($error['data']) }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
