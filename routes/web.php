<?php

use App\Http\Controllers\ArtifactAttachmentController;
use App\Http\Controllers\ArtifactController;
use App\Http\Controllers\BestPracticeController;
use App\Http\Controllers\CisoEducationController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\ControlAssessmentController;
use App\Http\Controllers\ControlAssessmentFindingController;
use App\Http\Controllers\ControlAuditFindingController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\ControlEvidenceController;
use App\Http\Controllers\ControlSmartSearch;
use App\Http\Controllers\ControlTypeController;
use App\Http\Controllers\DataUploaderController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\HotTopicsController;
use App\Http\Controllers\HRCertificationController;
use App\Http\Controllers\HROrganizationController;
use App\Http\Controllers\HumanResourceController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\ISO27001Controller;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainDomainController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\PeoplesController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProcessResourceController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\SubDomainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::middleware(['guest'])->group(function () {
    Route::post('/contact-inquiry', [LeadController::class, 'store'])->name('contact.store');
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
    Route::resource('best-practices', BestPracticeController::class);
    Route::resource('domains', MainDomainController::class);
    Route::resource('sub-domains', SubDomainController::class);
    Route::resource('controls', ControlController::class);
    Route::resource('control-types', ControlTypeController::class);


    // ------------------- ISO-27001 -------------------
    Route::get('/iso-27001', [ISO27001Controller::class, 'index'])->name('iso27001.index');
    Route::get('/iso-27001/{section:section_id}', [ISO27001Controller::class, 'show'])->name('iso27001.show');

    // ------------------- CONTROL SMART SEARCH -------------------

    Route::get('/control-smart-search', ControlSmartSearch::class)->name('control-smart-search.index');

    // ------------------- EVIDENCE TRACKING -------------------

    Route::resource('artifacts', ArtifactController::class);

    // Artifact Data Uploader
    Route::get('/upload-artifacts', [DataUploaderController::class, 'createArtifact'])->name('upload.artifact.create');
    Route::post('/upload-artifacts', [DataUploaderController::class, 'uploadArtifact'])->name('upload.artifact.store');

    Route::controller(ArtifactAttachmentController::class)->group(function () {
        Route::get('/attachments/{attachment}', 'show')->name('artifacts.attachments.show');
        Route::delete('/attachments/{attachment}', 'destroy')->name('artifacts.attachments.destroy');
    });

    // ------------------- EVIDENCE MANAGEMENT -------------------

    Route::resource('evidences', EvidenceController::class);
    Route::controller(EvidenceController::class)->group(function () {
        Route::get('/evidence-list/view/{evidence:evidence_id}', 'viewevilist')->name('evidence.view');
        Route::patch('/evidence-list/update_attachment', 'update_attachment')->name('evidence.update.attachment');
        Route::post('/evidence-list/delete-attachment', 'delete_attachment')->name('evidence.delete.attachment');
    });

    Route::controller(ControlEvidenceController::class)->group(function () {
        Route::get('/control-vs-evidence', 'controlVsEvidence')->name('control-vs-evidence.index');
        Route::get('/evidence-vs-control', 'evidenceVsControl')->name('evidence-vs-control.index');
    });

    Route::controller(ControlAuditFindingController::class)->group(function () {
        Route::get('/control-vs-audit-finding', 'controlVsAuditFinding')->name('control-vs-audit.index');
        Route::get('/audit-finding-vs-control', 'auditFindingVsControl')->name('audit-vs-control.index');
    });

    // ------------------- CONTROL ASSESSMENT -------------------

    Route::resource('control-assessments', ControlAssessmentController::class);
    Route::resource('control-assessment-findings', ControlAssessmentFindingController::class)->except(['index', 'create', 'store']);
    Route::controller(ControlAssessmentFindingController::class)->group(function () {
        Route::get('/control-assessment-findings/create/{controlAssessment}', 'create')->name('control-assessment-findings.create');
        Route::post('/control-assessment-findings/{controlAssessment}', 'store')->name('control-assessment-findings.store');
        Route::post('/evidence-conroller/', 'get_evidence_by_conroller');
    });

});

Route::middleware(['auth', 'must.change.password'])->group(function () {
    Route::view('/compliance', 'process/compliance')->name('compliance');
    Route::view('/vciso', 'vciso')->name('vciso');

    // ------------------- USERS -------------------

    // Profile update routes for non-admin users
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');

    Route::middleware('superadmin')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('hr-experts', HumanResourceController::class);

        // Industry Management Routes
        Route::resource('industries', IndustryController::class);

        // Expertise Management Routes
        Route::resource('expertises', ExpertiseController::class);

        // Designation Management Routes
        Route::resource('designations', DesignationController::class);
        Route::resource('nationalities', NationalityController::class);
        Route::resource('organizations', HROrganizationController::class);
        Route::resource('certifications', HRCertificationController::class);
        // Route::get('/options', [OptionsController::class, 'create'])->name('options.create');
        // Route::patch('/options', [OptionsController::class, 'update'])->name('options.update');
    });

    Route::view('/frameworks', 'process/framework')->name('frameworks');

    // ------------ISO-27001--------------

    Route::view('/scope-of-isms', 'process/iso-27001/scope-of-isms');
    Route::view('/isms', 'process/iso-27001/isms');
    Route::view('/asset-inventory', 'process/iso-27001/asset-inventory');
    Route::view('/risk-assessment-methodology', 'process/iso-27001/risk-assessment-methodology');
    Route::view('/risk-assessment', 'process/iso-27001/risk-assessment');
    Route::view('/risk-treatment-iso-27001', 'process/iso-27001/risk-treatment');
    Route::view('/risk-register-iso-27001', 'process/iso-27001/risk-register');
    Route::view('/statement-of-applicability', 'process/iso-27001/statement-of-applicability');
    Route::view('/project-management-security-framework', 'process/iso-27001/project-management-security-framework');
    Route::view('/network-security-framework', 'process/iso-27001/network-security-framework');
    Route::view('/secure-coding-framework', 'process/iso-27001/secure-coding-framework');
    Route::view('/hr-framework', 'process/iso-27001/hr-framework');
    Route::view('/third-party-security-framework', 'process/iso-27001/third-party-security-framework');
    Route::view('/internal-audit-27001', 'process/iso-27001/internal-audit');
    Route::view('/management-review-27001', 'process/iso-27001/management-review');

    // ------------MANAGE GRC DOMAIN RESOURCES CONTENT--------------

    Route::resource('cms', CMSController::class);
    Route::get('/cms/create-resource/{process}', [ResourceController::class, 'create'])->name('resource.create');
    Route::post('/upload-resource', [ResourceController::class, 'store'])->name('resource.store');

    // ------------------CISO 360-------------------------

    Route::prefix('ciso')->group(function () {

        // ------------------CISO Toolkit-------------------------

        Route::view('/toolkit', 'ciso/ciso-toolkit/index')->name('ciso-toolkit.index');

        // ------------------CISO Education-------------------------

        Route::get('/education', CisoEducationController::class)->name('ciso-education.index');

        Route::prefix('education')->group(function () {
            Route::view('/applying-cissp-knowledge-in-ksa', 'ciso/ciso-education/cissp')->name('cissp');
            Route::view('/applying-cism-knowledge-in-ksa', 'ciso/ciso-education/cism')->name('cism');
            Route::view('/applying-cgeit-knowledge-in-ksa', 'ciso/ciso-education/cgeit')->name('cgeit');
            Route::view('/applying-pmp-knowledge-in-ksa', 'ciso/ciso-education/pmp')->name('pmp');
            Route::view('/applying-agile-approach', 'ciso/ciso-education/agile')->name('agile');
        });

        // ------------------Hot Topics-------------------------

        Route::get('/hot-topics', HotTopicsController::class)->name('hot-topics.index');

        Route::prefix('hot-topics')->group(function () {
            Route::view('/compliance-challenges', 'ciso/hot-topics/compliance-challenges')->name('compliance-challenges');
            Route::view('/key-performance-indicator', 'ciso/hot-topics/key-performance-indicator')->name('key-performance-indicator');
            Route::view('/essential-kpis-kris', 'ciso/hot-topics/essential-kpis-kris')->name('essential-kpis-kris');
            Route::view('/risk-management-methodologies', 'ciso/hot-topics/risk-management-methodologies')->name('risk-management-methodologies');
            Route::view('/control-assessment-risk-assessment', 'ciso/hot-topics/control-assessment-risk-assessment')->name('control-assessment-risk-assessment');
            Route::view('/26-essential-items-checklist-awareness-topics', 'ciso/hot-topics/26-essential-items-checklist-awareness-topics')->name('26-essential-items');
            Route::view('/enhancing-staff-knowledge-skill', 'ciso/hot-topics/enhancing-staff-knowledge-skill')->name('enhancing-staff-knowledge');
            Route::view('/asset-inventory-configuration-management-database', 'ciso/hot-topics/asset-inventory-configuration-management-database')->name('asset-inventory');
            Route::view('/essential-practical-cryptographic-deployment', 'ciso/hot-topics/essential-practical-cryptographic-deployment')->name('essential-practical-cryptographic');
            Route::view('/data-information', 'ciso/hot-topics/data-information')->name('data-information');
            Route::view('/selecting-va-pen-tester', 'ciso/hot-topics/selecting-va-pen-tester')->name('selecting-va-pen-tester');
            Route::view('/incident-management-cybersecurity-incident-management', 'ciso/hot-topics/incident-management-cybersecurity-incident-management')->name('incident-management');
            Route::view('/review-vs-audit', 'ciso/hot-topics/review-vs-audit')->name('review-vs-audit');
        });

        // ------------------People-------------------------

        Route::get('/peoples', PeoplesController::class)->name('people.index');
        // Route::get('/hr-experts/upload', [DataUploaderController::class, 'createHr'])->name('hr.upload');
        // Route::post('/hr-experts/upload', [DataUploaderController::class, 'UploadHr'])->name('hr.upload.store');

        // ------------------Process-------------------------

        Route::get('/process', [ProcessController::class, 'index'])->name('ciso-process.index');
        Route::get('/process/{process:process_id}', [ProcessController::class, 'show'])->name('process.view.show');

        // ------------------Process Resources-------------------------

        Route::get('/resource/{process:process_id}/checklist/', [ProcessResourceController::class, 'checklist'])->name('process.resource.checklist');
        Route::get('/resource/{process:process_id}/videos/', [ProcessResourceController::class, 'videos'])->name('process.resource.videos');
        Route::get('/video/stream/{resource}', [ProcessResourceController::class, 'stream'])->name('secure.video.stream');
        Route::get('/resource/{process:process_id}/template/', [ProcessResourceController::class, 'template'])->name('process.resource.template');
        Route::get('/resource/template/{resource}', [ProcessResourceController::class, 'pdfTemplate'])->name('process.resource.template.pdf');
        Route::get('/resource/{process:process_id}/glossary/', [ProcessResourceController::class, 'glossary'])->name('process.resource.glossary');
        Route::get('/resource/download/{resource}', [ProcessResourceController::class, 'download'])->name('process.resource.download');
        Route::delete('/resources/{resource}', [ProcessResourceController::class, 'destroy'])->name('process.resource.destroy');

        // ------------------Products-------------------------

        Route::get('/products', ProductsController::class)->name('ciso-products.index');

        Route::prefix('products')->group(function () {
            Route::view('/anti-phishing-software', 'ciso/products/anti-phishing-software')->name('products.anti-phishing-software');
            Route::view('/anti-ransomware-software', 'ciso/products/anti-ransomware-software')->name('products.anti-ransomware-software');
            Route::view('/application-whitelisting', 'ciso/products/application-whitelisting')->name('products.application-whitelisting');
            Route::view('/backup-recovery', 'ciso/products/backup-recovery')->name('products.backup-recovery');
            Route::view('/brand-protection', 'ciso/products/brand-protection')->name('products.brand-protection');
            Route::view('/casb', 'ciso/products/casb')->name('products.casb');
            Route::view('/container-kubernetes-security', 'ciso/products/container-kubernetes-security')->name('products.container-kubernetes-security');
            Route::view('/data-classification', 'ciso/products/data-classification')->name('products.data-classification');
            Route::view('/data-loss-prevention', 'ciso/products/data-loss-prevention')->name('products.data-loss-prevention');
            Route::view('/database-activity-monitoring', 'ciso/products/database-activity-monitoring')->name('products.database-activity-monitoring');
            Route::view('/distributed-denial-of-service-of-attack', 'ciso/products/distributed-denial-of-service-of-attack')->name('products.distributed-denial-of-service-of-attack');
            Route::view('/email-security', 'ciso/products/email-security')->name('products.email-security');
            Route::view('/encryption', 'ciso/products/encryption')->name('products.encryption');
            Route::view('/end-point-detection-response', 'ciso/products/end-point-detection-response')->name('products.end-point-detection-response');
            Route::view('/extended-detection-protection-response', 'ciso/products/extended-detection-protection-response')->name('products.extended-detection-protection-response');
            Route::view('/identity-access-management', 'ciso/products/identity-access-management')->name('products.identity-access-management');
            Route::view('/iot-security', 'ciso/products/iot-security')->name('products.iot-security');
            Route::view('/multi-factor-authentication', 'ciso/products/multi-factor-authentication')->name('products.multi-factor-authentication');
            Route::view('/network-access-control', 'ciso/products/network-access-control')->name('products.network-access-control');
            Route::view('/next-generation-firewall', 'ciso/products/next-generation-firewall')->name('products.next-generation-firewall');
            Route::view('/penetration-testing', 'ciso/products/penetration-testing')->name('products.penetration-testing');
            Route::view('/privilege-access-management', 'ciso/products/privilege-access-management')->name('products.privilege-access-management');
            Route::view('/siem-solution', 'ciso/products/siem-solution')->name('products.siem-solution');
            Route::view('/threat-intelligence', 'ciso/products/threat-intelligence')->name('products.threat-intelligence');
            Route::view('/unified-threat-management', 'ciso/products/unified-threat-management')->name('products.unified-threat-management');
            Route::view('/user-entity-behavior-analytics', 'ciso/products/user-entity-behavior-analytics')->name('products.user-entity-behavior-analytics');
            Route::view('/web-application-firewall', 'ciso/products/web-application-firewall')->name('products.web-application-firewall');
            Route::view('/wifi-security', 'ciso/products/wifi-security')->name('products.wifi-security');
            Route::view('/zero-day-attack', 'ciso/products/zero-day-attack')->name('products.zero-day-attack');
            Route::view('/zero-trust', 'ciso/products/zero-trust')->name('products.zero-trust');
        });
    });

    // ------------------PITSTOP-------------------------

    // ------------------- TEMPORARY HR CERTIFICATION IMPORT -------------------

    Route::get('/import-hr-certifications/{filePath}', function ($filePath) {
        try {
            // Decode the file path
            $decodedPath = base64_decode($filePath);
            $fullPath = base_path($decodedPath);

            // Security check: ensure the file exists and is within the project
            if (! file_exists($fullPath) || ! str_starts_with(realpath($fullPath), realpath(base_path()))) {
                return response()->json(['error' => 'File not found or invalid path'], 404);
            }

            if (($handle = fopen($fullPath, 'r')) !== false) {
                $imported = 0;
                $errors = [];
                $rowNum = 0;

                while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                    $rowNum++;

                    // Skip header row
                    if ($rowNum === 1) {
                        continue;
                    }

                    // Validate and prepare data
                    $certificationId = trim($data[0] ?? '');
                    $certificationTitle = trim($data[1] ?? '');
                    $institute = trim($data[2] ?? null);

                    if (empty($certificationId) || empty($certificationTitle)) {
                        $errors[] = "Row {$rowNum}: Missing certification_id or certification_title";

                        continue;
                    }

                    try {
                        DB::table('hr_certification_table')->insert([
                            'certification_id' => $certificationId,
                            'certification_title' => $certificationTitle,
                            'institute' => empty($institute) ? null : $institute,
                        ]);
                        $imported++;
                    } catch (\Exception $e) {
                        $errors[] = "Row {$rowNum}: ".$e->getMessage();
                    }
                }

                fclose($handle);

                return response()->json([
                    'success' => true,
                    'imported' => $imported,
                    'errors' => $errors,
                    'total_errors' => count($errors),
                ]);
            } else {
                return response()->json(['error' => 'Unable to open file'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    })->name('import.hr-certifications');

});
