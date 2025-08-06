<?php

use App\Http\Controllers\ArtifactAttachmentController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpertOrganizationController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\ExpertRoleController;
use App\Http\Controllers\ExpertiesController;
use App\Http\Controllers\ExpertEducationController;
use App\Http\Controllers\ExpertCertificationController;
use App\Http\Controllers\ArtifactController;
use App\Http\Controllers\ControlAssessmentController;
use App\Http\Controllers\ControlAssessmentFindingController;
use App\Http\Controllers\RiskAssessmentController;
use App\Http\Controllers\RiskAssessmentFindingController;
use App\Http\Controllers\MainDashboardController;
use App\Http\Controllers\NcaEccAssessmentController;
use App\Http\Controllers\NcsCsccIdentificationController;
use App\Http\Controllers\NcaCsccAssessmentController;
use App\Http\Controllers\NcaCccTenantsController;
use App\Http\Controllers\NcaCccProviderController;
use App\Http\Controllers\NcaTccAssessmentController;
use App\Http\Controllers\NcaOsmaccIdentificationController;
use App\Http\Controllers\NcaOsmaccAssessmentController;
use App\Http\Controllers\NcaDccAssessmentController;
use App\Http\Controllers\MisReportsController;
use App\Http\Controllers\RiskTreatmentController;
use App\Http\Controllers\RiskAssetGroupTableController;
use App\Http\Controllers\RiskCveController;
use App\Http\Controllers\CvssController;
use App\Http\Controllers\VaTypeController;
use App\Http\Controllers\VaSubTypeController;
use App\Http\Controllers\RiskIdentificationController;
use App\Http\Controllers\RiskMethodologyController;
use App\Http\Controllers\RiskTypeController;
use App\Http\Controllers\RiskSubTypeController;
use App\Http\Controllers\RiskGroupController;
use App\Http\Controllers\RiskKriController;
use App\Http\Controllers\RiskKpiController;
use App\Http\Controllers\RiskTreatmentOptionsController;
use App\Http\Controllers\RiskAppetiteController;
use App\Http\Controllers\RiskInherentController;
use App\Http\Controllers\RiskAcceptanceController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\ControlTypeController;
use App\Http\Controllers\AuditPlanController;
use App\Http\Controllers\AuditMaterController;
use App\Http\Controllers\AuditFindingController;
use App\Http\Controllers\AuditorFormController;
use App\Http\Controllers\AuditeeController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SubDepartmentController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\OwnerRoleController;
use App\Http\Controllers\CustodianRoleController;
use App\Http\Controllers\CustodianController;
use App\Http\Controllers\BestPracticeController;
use App\Http\Controllers\MainDomainController;
use App\Http\Controllers\SubDomainController;
use App\Http\Controllers\AssetRegisterController;
use App\Http\Controllers\AssetStatusController;
use App\Http\Controllers\AssetTypeController;
use App\Http\Controllers\AssetSubTypeController;
use App\Http\Controllers\AssetGroupController;
use App\Http\Controllers\ControlSmartSearch;
use App\Http\Controllers\TempFileUploadController;
use App\Http\Controllers\ThreatAgentController;
use App\Http\Controllers\ThreatAgentSubTypeController;
use App\Http\Controllers\ThreatAgentRatingController;
use App\Http\Controllers\ThreatAgentTypeController;
use App\Http\Controllers\ThreatAgentVectorController;
use App\Http\Controllers\VaMasterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RCDBController;
use App\Http\Controllers\RiskRegisterController;
use App\Http\Controllers\RegulatoryExcelReportController;
use App\Http\Controllers\RegulatorySummaryReportController;
use App\Http\Controllers\ControlEvidenceController;
use App\Http\Controllers\ControlAuditFindingController;
use App\Http\Controllers\OCDController;
use App\Http\Controllers\AssetSmartSearch;
use App\Http\Controllers\AuditPlanReportController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\DataUploaderController;
use App\Http\Controllers\HumanResourceController;
use App\Http\Controllers\KPICategoryController;
use App\Http\Controllers\KPIStandardController;
use App\Http\Controllers\KPIStandardReportController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ObjectivesController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\PatchController;
use App\Http\Controllers\PenTestController;
use App\Http\Controllers\PenTestDashboardController;
use App\Http\Controllers\PenTestFindingsController;
use App\Http\Controllers\PenTestReportController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProcessResourceController;
use App\Http\Controllers\RegulatoryReportController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\RiskStatusController;
use App\Http\Controllers\ThirdPartyController;
use App\Http\Controllers\TPTExpertsControl;
use App\Http\Controllers\VulnerabilityRegisterController;
use App\Models\ControlMaster;
use Illuminate\Support\Facades\DB;

Route::middleware(['guest'])->group(function () {

    Route::view('/', 'welcome')->name('welcome');

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    Route::view('/home', 'home')->name('home');
    Route::view('/compliance', 'process/compliance')->name('compliance');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
});


// ------------------- INITIAL SETUP -------------------

Route::resource('organizations', OrganizationController::class);
Route::resource('locations', LocationController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('sub-departments', SubDepartmentController::class);
Route::resource('classifications', ClassificationController::class);
Route::resource('categories', CategoryController::class);
Route::resource('sub-categories', SubCategoryController::class);
Route::resource('best-practices', BestPracticeController::class);
Route::resource('domains', MainDomainController::class);
Route::resource('sub-domains', SubDomainController::class);
Route::resource('owner-roles', OwnerRoleController::class);
Route::resource('owners', OwnerController::class);
Route::resource('custodian-roles', CustodianRoleController::class);
Route::resource('custodians', CustodianController::class);

// ------------------- ASSET REGISTRATION -------------------

Route::resource('assets', AssetRegisterController::class);
Route::resource('asset-status', AssetStatusController::class);
Route::resource('asset-types', AssetTypeController::class);
Route::resource('asset-sub-types', AssetSubTypeController::class);
Route::resource('asset-groups', AssetGroupController::class);

// ------------------- EVIDENCE TRACKING -------------------

Route::resource('artifacts', ArtifactController::class);

// ------------------- USERS -------------------

Route::middleware('superadmin')->group(function () {
    Route::resource('users', UserController::class);
    // Route::get('/options', [OptionsController::class, 'create'])->name('options.create');
    // Route::patch('/options', [OptionsController::class, 'update'])->name('options.update');
});

// ------------------- THREAT MANAGEMENT -------------------

Route::resource('threat-agents', ThreatAgentController::class);
Route::resource('threat-agent-types', ThreatAgentTypeController::class);
Route::resource('threat-agent-sub-types', ThreatAgentSubTypeController::class);
Route::resource('threat-agent-ratings', ThreatAgentRatingController::class);
Route::resource('threat-agent-vectors', ThreatAgentVectorController::class);

// ------------------- VULNERABILITY MANAGEMENT -------------------

Route::resource('vulnerabilities', VaMasterController::class);
Route::resource('cves', RiskCveController::class);
Route::resource('cvss', CvssController::class);
Route::resource('vulnerability-types', VaTypeController::class);
Route::resource('vulnerability-sub-types', VaSubTypeController::class);


// ------------------- RISK IDENTIFICATION -------------------

Route::resource('risks', RiskIdentificationController::class);
Route::resource('risk-methodology', RiskMethodologyController::class);
Route::resource('risk-groups', RiskGroupController::class);
Route::resource('risk-types', RiskTypeController::class);
Route::resource('risk-sub-types', RiskSubTypeController::class);
Route::resource('kris', RiskKriController::class);
Route::resource('kpis', RiskKpiController::class);
Route::resource('risk-treatment-options', RiskTreatmentOptionsController::class);
Route::resource('risk-appetites', RiskAppetiteController::class);
Route::resource('risk-inherents', RiskInherentController::class);
Route::resource('risk-acceptances', RiskAcceptanceController::class);


// ------------------- RISK TREATMENT -------------------

Route::prefix('risk-treatment')->controller(RiskTreatmentController::class)->group(function () {
    Route::get('/risk-vs-control', 'riskVsControl')->name('risk-vs-control.index');
    Route::get('/control-vs-risk', 'controlVsRisk')->name('control-vs-risk.index');
});

// ------------------- RISK ON ASSET GROUP -------------------

Route::controller(RiskAssetGroupTableController::class)->group(function () {
    Route::get('/risk-vs-asset-group', 'riskVsAssetGroup')->name('risk-vs-asset-group.index');
    Route::get('/asset-group-vs-risk', 'assetGroupVsRisk')->name('asset-group-vs-risk.index');
});

// ------------------- RISK REGISTER -------------------

Route::controller(RiskRegisterController::class)->group(function () {
    Route::get('/risk-register', 'index')->name('risk-register.index');
    Route::get('/risk-register-excel', 'getRiskRegisterExcel')->name('risk.register.excel');
});

// ------------------- RISK STATUS -------------------

Route::controller(RiskStatusController::class)->group(function () {
    Route::get('/risk-status', 'index')->name('risk-status.index');
});

// ------------------- VULNERABILITY REGISTER -------------------

Route::controller(VulnerabilityRegisterController::class)->group(function () {
    Route::get('/vulnerability-register', 'index')->name('va.register');
    Route::get('/vulnerability-register-excel', 'generateExcelReport')->name('va.register.excel');
});

// ------------------- CONTROL IDENTIFICATION -------------------

Route::resource('controls', ControlController::class);
Route::resource('control-types', ControlTypeController::class);
Route::resource('kpi-standards', KPIStandardController::class);

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

// ------------------- CONTROL ASSESSMENT -------------------

Route::resource('control-assessments', ControlAssessmentController::class);
Route::resource('control-assessment-findings', ControlAssessmentFindingController::class)->except(['index', 'create', 'store']);
Route::controller(ControlAssessmentFindingController::class)->group(function () {
    Route::get('/control-assessment-findings/create/{controlAssessment}', 'create')->name('control-assessment-findings.create');
    Route::post('/control-assessment-findings/{controlAssessment}', 'store')->name('control-assessment-findings.store');
    Route::post('/evidence-conroller/', 'get_evidence_by_conroller');
});

// ------------------- CONTROL SMART SEARCH -------------------

Route::get('/control-smart-search', ControlSmartSearch::class)->name('control-smart-search.index');



// ------------RISK ASSESSMENTS--------------

Route::resource('risk-assessments', RiskAssessmentController::class);
Route::controller(RiskAssessmentController::class)->group(function () {
    Route::post('/risk-control/', 'get_control_by_risk');
});


Route::resource('risk-assessment-findings', RiskAssessmentFindingController::class)->except(['index', 'create', 'store']);
Route::controller(RiskAssessmentFindingController::class)->group(function () {
    Route::get('/risk-assessment-findings/create/{riskAssessment}', 'create')->name('risk-assessment-findings.create');
    Route::post('/risk-assessment-finding-input/{riskAssessment}', 'store')->name('risk-assessment-findings.store');
});

// ------------AUDIT MANAGEMENT--------------

Route::resource('audit-plans', AuditPlanController::class);
Route::resource('auditors', AuditorFormController::class);
Route::resource('auditees', AuditeeController::class);

Route::controller(AuditPlanReportController::class)->group(function () {
    Route::get('/audit-plan-report', 'index')->name('audit-plan-report.index');
    Route::get('/audit-plan-summarize-report', 'summarizeReport')->name('audit.plan.report.summarize');
    Route::get('/audit-plan-excel-report', 'generateExcelReport')->name('audit.plan.excel.report');
    Route::get('/audit-plan-summarize-excel-report', 'generateSummarizeExcelReport')->name('audit.plan.summarize.excel.report');
});

// ------------AUDIT ASSESSMENTS--------------

Route::resource('audit-assessments', AuditMaterController::class);
Route::resource('audit-findings', AuditFindingController::class)->except(['index', 'create', 'store']);
Route::controller(AuditFindingController::class)->group(function () {
    Route::get('/audit-findings/create/{auditAssessment}', 'create')->name('audit-findings.create');
    Route::post('/audit-findings/{auditAssessment}', 'store')->name('audit-findings.store');
});

Route::controller(ControlAuditFindingController::class)->group(function () {
    Route::get('/control-vs-audit-finding', 'controlVsAuditFinding')->name('control-vs-audit.index');
    Route::get('/audit-finding-vs-control', 'auditFindingVsControl')->name('audit-vs-control.index');
});


// ------------VULNERABILITY ASSESSMENT / PENETRATION TEST TRACKING--------------

Route::resource('va-pen-tests', PenTestController::class);
Route::resource('va-pen-test-findings', PenTestFindingsController::class)->except(['index', 'create', 'store']);
Route::controller(PenTestFindingsController::class)->group(function () {
    Route::get('/va-pen-test-findings/create/{penTest}', 'create')->name('va-pen-test-findings.create');
    Route::post('/va-pen-test-findings/{penTest}', 'store')->name('va-pen-test-findings.store');
    Route::post('/upload-poc', 'uploadPoc')->name('va-pen-test-findings.upload');
    Route::delete('/delete-temp-poc', 'deleteTempPoc')->name('va-pen-test-findings.poc.temp.destroy');
    Route::delete('/delete-poc/{attachment}', 'deletePoc')->name('va-pen-test-findings.poc.destroy');
});

Route::resource('patches', PatchController::class);
Route::resource('third-party', ThirdPartyController::class);
Route::resource('tpt-experts', TPTExpertsControl::class);


Route::controller(PenTestReportController::class)->group(function () {
    Route::get('/va-asset-vs-risk', 'assetVsRisk')->name('pen-test-asset-vs-risk.index');
    // Route::get('/va-pen-test-report/{penTest:va_pt_test_id}', 'report')->name('pen-test-report');
});


// ------------REPORTING--------------

Route::resource('kpi-categories', KPICategoryController::class);
Route::controller(KPICategoryController::class)->group(function () {
    Route::get('/kpi-references', 'report')->name('kpi-references.index');
});

Route::resource('kpi-standards-report', KPIStandardReportController::class);

Route::view('/frameworks', 'process/framework')->name('frameworks');


// ------------MANAGE GRC DOMAIN RESOURCES CONTENT--------------

Route::resource('cms/process', CMSController::class);

Route::get('/create-resource/{process}', [ResourceController::class, 'create'])->name('resource.create');
Route::post('/upload-resource', [ResourceController::class, 'store'])->name('resource.store');

Route::controller(PenTestDashboardController::class)->group(function () {
    Route::get('/va-pen-test-list', 'list')->name('pen-test-dashboard.index');
    Route::get('/va-pen-test-dashboard/{penTest:va_pt_test_id}', 'index')->name('pen-test-dashboard');
    Route::get('/va-pen-test-level/{penTest:va_pt_test_id}/{level}', 'level')->name('pen-test-level');
    Route::get('/va-pen-test-level-status/{penTest:va_pt_test_id}', 'levelStatus')->name('pen-test-level-status');
    Route::get('/va-pen-test-status/{penTest:va_pt_test_id}/{status}', 'status')->name('pen-test-status');
    Route::get('/va-pen-test-level-records/{penTest:va_pt_test_id}', 'levelRecords')->name('pen-test-level-records');
});


// Route::get('/insert-record', function () {
//     $controlIds = ControlMaster::where('control_reference', 'NCA-DCC')->where('control_id', 'LIKE', 'NCA-DCC-3-1owner-controls/1-1.STRG-OWNR?status=null%')->get()->pluck('control_id');
//     // $controlIds = ControlMaster::where('control_reference', 'NCA-DCC')->get()->pluck('control_id');
//     // return $controlIds;

//     foreach ($controlIds as $controlId) {
//         // DB::table('control_master_table_vs_custodian_role_table')->insert([
//         //     'control_id' => $controlId,
//         //     'custodian_id' => '1-2.MNGT-CSTD'
//         // ]);

//         DB::table('control_master_table_vs_custodian_role_table')
//             ->where('control_id', $controlId)
//             ->update([
//                 'custodian_id' => '3-1.BCM-CSTD'
//             ]);
//     }
//     return "Done";
//     return $controlIds;
// });



Route::middleware(['auth'])->group(function () {



    // Route::post('/att', [ArtifactController::class, 'add'])->name('att.store');

    // Three Ps
    Route::get('/vciso', function () {
        return view('2-ThreePs.1-ThreePs');
    });





    // Experts
    Route::controller(ExpertController::class)->group(function () {
        Route::get('/people', 'index')->name('experts.index');
        Route::get('/expert-input', 'view');
        Route::post('/expert-input/post', 'store');
        // Route::delete('/risk-identification/delete', 'delete')->name('delete.riskident');
        // Route::get('/risk-identification-table/{risk_id}', 'show');
    });

    // Organization
    Route::get('/expert-organization-input', function () {
        return view('3-People/9-ExpertOrganization');
    });

    Route::controller(ExpertOrganizationController::class)->group(function () {
        Route::post('/expert-organization-input/post', 'store');
        Route::post('/expert-organization-input', 'getOrganizationCount');
        Route::get('/expert-organization-list', 'index');
        Route::delete('/expert-organization/delete', 'delete')->name('delete.expertOrg');
        Route::get('/expert-organization-table/{expert_organization_id}', 'show');
    });

    // ------------Industry---------------

    Route::controller(IndustryController::class)->group(function () {
        Route::post('/expert-industry-input/post', 'store');
        Route::get('/expert-industry-list', 'index');
        Route::get('/expert-industry-table/{industry_id}', 'show');
        Route::delete('/expert-industry/delete', 'delete')->name('delete.industry');
    });


    Route::get('/expert-industry-input', function () {
        return view('3-People/7-IndustryInput');
    });


    // ------------Expert Role---------------



    Route::controller(ExpertRoleController::class)->group(function () {
        Route::post('/expert-role-input/post', 'store');
        Route::get('/expert-role-list', 'index');
        Route::get('/expert-role-table/{expert_role_id}', 'show');
        Route::delete('/expert-role/delete', 'delete')->name('delete.role');
    });


    Route::get('/expert-role-input', function () {
        return view('3-People/3-ExpertRoleInput');
    });




    // ------------Expertise---------------



    Route::controller(ExpertiesController::class)->group(function () {
        Route::post('/expert-expertise-input/post', 'store');
        Route::get('/expert-expertise-list', 'index');
        Route::get('/expert-expertise-table/{expert_experties_id}', 'show');
        Route::delete('/expert-expertise/delete', 'delete')->name('delete.expertise');
    });


    Route::get('/expert-expertise-input', function () {
        return view('3-People/4-ExpertExpertiesInput');
    });


    // ------------Education---------------



    Route::controller(ExpertEducationController::class)->group(function () {
        Route::post('/expert-education-input/post', 'store');
        Route::get('/expert-education-list', 'index');
        Route::get('/expert-education-table/{expert_experties_id}', 'show');
        Route::delete('/expert-education/delete', 'delete')->name('delete.education');
    });


    Route::get('/expert-education-input', function () {
        return view('3-People/5-ExpertEducationInput');
    });


    // ------------Education---------------



    Route::controller(ExpertCertificationController::class)->group(function () {
        Route::post('/expert-certification-input/post', 'store');
        Route::get('/expert-certification-list', 'index');
        Route::get('/expert-certification-table/{certification_id}', 'show');
        Route::delete('/expert-certification/delete', 'delete')->name('delete.certification');
    });


    Route::get('/expert-certification-input', function () {
        return view('3-People/6-ExpertCertificationInput');
    });


    // Attachments
    Route::controller(TempFileUploadController::class)->group(function () {
        Route::post('/uploads', 'store')->name('temp.upload.store');
        Route::delete('/tmp/delete', 'destroy')->name('temp.upload.destroy');
    });

    Route::controller(ArtifactAttachmentController::class)->group(function () {
        Route::get('/attachments/{attachment}', 'show')->name('artifacts.attachments.show');
        Route::delete('/attachments/{attachment}', 'destroy')->name('artifacts.attachments.destroy');
    });


    Route::get('/domain-vs-control-dashboard', [DashboardController::class, 'domainControllersReport'])->name('domain-vs-control-dashboard');
    Route::get('/control-vs-risk-dashboard', [DashboardController::class, 'controlRisksReport'])->name('control-vs-risk-dashboard');
    Route::get('/risk-vs-asset-dashboard', [DashboardController::class, 'riskAssetsReport'])->name('risk-vs-asset-dashboard');



    Route::controller(OCDController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('compliance-dashboard.index');
        Route::get('/domain-compliance/{bestPractice}', 'domain')->name('domain-compliance.show');
        Route::get('/subdomain-compliance/{domainId}', 'subdomain')->name('subdomain-compliance.show');
        Route::get('/owner-compliance/{subdomainId}', 'owner')->name('owner-compliance.show');
        Route::get('/owner-controls/{ownerId}', 'ownerControls');
        Route::get('/risk-domain-compliance', 'riskDomain')->name('risk-domain-compliance.show');
        Route::get('/risk-subdomain-compliance/{domainId}', 'riskSubdomain')->name('risk-subdomain-compliance.show');
        Route::get('/risk-owners-compliance/{subdomainId}', 'riskOwners')->name('risk-owners-compliance.show');
        Route::get('/risk-owner-compliance/{ownerId}', 'riskOwner')->name('risk-owner-compliance.show');
        Route::get('/asset-type-compliance/{groupId}', 'assetType')->name('asset-type-compliance.show');
        Route::get('/domain-evidence/{bestPracticeId}', 'domainEvidence')->name('domain-evidence.show');
        Route::get('/subdomain-evidence/{domainId}', 'subdomainEvidence')->name('subdomain-evidence.show');
        Route::get('/controls-evidence/{subdomainId}', 'controlEvidence')->name('control-evidence.show');
        Route::get('/asset-group-risks/{assetGroupId}', 'assetGroupRisks');
        Route::get('/group-asset-risks/{asset:asset_id}', 'groupAssetRisks');
        Route::get('/sama-maturity-level/{level}', 'samaMaturityLevel');
        Route::get('/sama-maturity-level-details/{level}', 'samaMaturityLevelDetails');
    });


    Route::controller(RCDBController::class)->group(function () {
        Route::get('/risk-complaince-dashboard', 'index')->name('risk-compliance.index');
        Route::get('/risk-owner/{owner:owner_role_id}', 'show')->name('risk-owner.show');
        Route::get('/risk-controls/{risk:risk_id}', 'riskControls')->name('risk-controls.show');
    });

    Route::get('/cs-strategy-dashboard', function () {
        return view('process/18-Reporting/3-Dashboard/5-OCDCSGOV');
    });

    Route::get('/cs-defense-dashboard', function () {
        return view('process/18-Reporting/3-Dashboard/6-OCDCSDEF');
    });

    Route::get('/cs-resilience-dashboard', function () {
        return view('process/18-Reporting/3-Dashboard/7-OCDCSRES');
    });

    Route::get('/cs-third-party-dashboard', function () {
        return view('process/18-Reporting/3-Dashboard/8-OCDCSTPT');
    });

    Route::get('/cs-ics-dashboard', function () {
        return view('process/18-Reporting/3-Dashboard/9-OCDCSICS');
    });


    // End of Show Dashboard


    Route::controller(MainDashboardController::class)->group(function () {
        Route::get('/dashboard-one', 'getRecordCount');
        Route::post('/dashboard-one', 'getRecordCount')->name('dashboardCount');
    });



    // Regulatory Reports New

    Route::get('/regulatory-reports', function () {

        return view('process/18-Reporting/1-RegulatoryReportsNew/1-RegulatoryReport');
    });

    Route::controller(RegulatorySummaryReportController::class)->group(function () {
        Route::get('/ecc-regulatory-summary', 'eccsummaryreport')->name('ecc-regulatory-summary.show');
        Route::get('/cscc-regulatory-summary', 'csccsummaryreport')->name('cscc-regulatory-summary.show');
        Route::get('/ccc-regulatory-summary', 'cccsummaryreport')->name('ccc-regulatory-summary.show');
        Route::get('/tcc-regulatory-summary', 'tccsummaryreport')->name('tcc-regulatory-summary.show');
        Route::get('/osmacc-regulatory-summary', 'Osmaccsummaryreport')->name('osmacc-regulatory-summary.show');
        Route::get('/dcc-regulatory-summary', 'Dccsummaryreport')->name('dcc-regulatory-summary.show');
    });

    Route::controller(RegulatoryReportController::class)->group(function () {
        Route::get('/nca-regulatory-reports', 'index')->name('nca-regulatory-reports.index');
        Route::get('/regulatory-reports', 'create')->name('regulatory-reports.create');
        Route::get('/regulatory-reports/generate', 'show')->name('regulatory-reports.show');
        Route::get('/ecc-regulatory-report', 'ecc')->name('ecc-regulatory-report.show');
        Route::get('/ecc-2024-regulatory-report', 'ecc_2024')->name('ecc-2024-regulatory-report.show');
        Route::get('/cscc-regulatory-report', 'cscc')->name('cscc-regulatory-report.show');
        Route::get('/ccc-regulatory-report', 'ccc')->name('ccc-regulatory-report.show');
        Route::get('/tcc-regulatory-report', 'tcc')->name('tcc-regulatory-report.show');
        Route::get('/osmacc-regulatory-report', 'osmacc')->name('osmacc-regulatory-report.show');
        Route::get('/dcc-regulatory-report', 'dcc')->name('dcc-regulatory-report.show');
        Route::get('/sama-regulatory-report', 'sama')->name('sama-regulatory-report.show');
    });


    // Regulatory Report Detail

    Route::controller(RegulatoryExcelReportController::class)->group(function () {
        Route::get('/ecc-regulatory-report-downloads', 'ccc')->name('ecc-regulatory-report.download');

        Route::get('/ecc-regulatory-report-excel', 'ecc')->name('ecc-regulatory-report.excel');
        Route::get('/ecc-2024-regulatory-report-excel', 'downloadEcc2024ExcelReport')->name('ecc-2024-regulatory-report.excel');
        Route::get('/cscc-regulatory-report-excel', 'downloadCsccExcelReport')->name('cscc-regulatory-report.excel');
        Route::get('/ccc-regulatory-report-excel', 'downloadCccExcelReport')->name('ccc-regulatory-report.excel');
        Route::get('/tcc-regulatory-report-excel', 'downloadTccExcelReport')->name('tcc-regulatory-report.excel');
        Route::get('/osmacc-regulatory-report-excel', 'downloadOsmaccExcelReport')->name('osmacc-regulatory-report.excel');
        Route::get('/dcc-regulatory-report-excel', 'downloadDccExcelReport')->name('dcc-regulatory-report.excel');
        Route::get('/sama-regulatory-report-excel', 'sama')->name('sama-regulatory-report.excel');
    });






    Route::get('/personal-data-frameworks', function () {
        return view('process/PdplFramework');
    });


    // Reporting



    Route::controller(NcaEccAssessmentController::class)->group(function () {
        Route::get('/nca-ecc-assessment', 'index');
        Route::get('/nca-ecc-assessment-report/{bestpracticetype?}', 'report')->name('nca.ecc.report');
    });


    Route::controller(NcsCsccIdentificationController::class)->group(function () {
        Route::get('/nca-cscc-identification', 'index');
    });


    Route::controller(NcaCsccAssessmentController::class)->group(function () {
        Route::get('/nca-cscc-assessment', 'index');
        Route::get('/nca-cscc-assessment/{id}', 'show')->name('nca.cscc.show');
    });


    Route::controller(NcaCccTenantsController::class)->group(function () {
        Route::get('/nca-css-tenants', 'index');
    });


    Route::controller(NcaCccProviderController::class)->group(function () {
        Route::get('/nca-ccc-providers', 'index');
    });


    Route::controller(NcaTccAssessmentController::class)->group(function () {
        Route::get('/nca-tcc-assessment', 'index');
        Route::get('/nca-tcc-assessment/{id}', 'show')->name('nca.tcc.show');
    });


    Route::controller(NcaOsmaccIdentificationController::class)->group(function () {
        Route::get('/nca-osmacc-identification', 'index');
    });



    Route::controller(NcaOsmaccAssessmentController::class)->group(function () {
        Route::get('/nca-osmacc-assessment', 'index');
        Route::get('/nca-osmacc-assessment/{id}', 'show')->name('nca.osmacc.show');
    });


    Route::controller(NcaDccAssessmentController::class)->group(function () {
        Route::get('/nca-dcc-assessment', 'index');
        Route::get('/nca-dcc-assessment/{id}', 'show')->name('nca.dcc.show');
    });


    // ------------------MIS Reports-------------------------


    Route::get('/mis-reporting', function () {
        return view('process/18-Reporting/2-MISReporting/0-MisReporting');
    });

    Route::controller(MisReportsController::class)->group(function () {
        Route::get('/management-by-exceptions', 'mbe')->name('mbe.index');
        Route::get('/management-by-exceptions-risk', 'mbe_risks')->name('mbe-risk.index');
        Route::get('/management-by-exceptions-asset', 'mbe_assets')->name('mbe-asset.index');

        Route::get('/mbe-pdf', 'downloadPdf')->name('mbe.pdf');

        Route::get('/list-critical-assets', 'listcritical');
        Route::get('/risk-critical-assets', 'riskcritical');
        Route::get('/control-critical-assets', 'controlcritical');
        Route::get('/control-critical-assets-download', 'downloadPDF')->name('criticalpdf');
        Route::get('/list-cloud-assets', 'listcloud');
        Route::get('/risk-cloud-assets', 'riskcloud');
        Route::get('/control-cloud-assets', 'controlcloud');
        Route::get('/list-telework-assets', 'listtelework');
        Route::get('/risk-telework-assets', 'risktelework');
        Route::get('/control-telework-assets', 'controltelework');
        Route::get('/list-social-media-assets', 'listSocialMedia');
        Route::get('/risk-social-media-assets', 'riskSocialMedia');
        Route::get('/control-social-media-assets', 'controlSocialMedia');
        Route::get('/list-data-privacy-assets', 'listDataPrivacy');
        Route::get('/risk-data-privacy-assets', 'riskDataPrivacy');
        Route::get('/control-data-privacy-assets', 'controlDataPrivacy');
        Route::get('/list-pii-assets', 'listPii');
        Route::get('/risk-pii-assets', 'riskPii');
        Route::get('/control-pii-assets', 'controlPii');
        Route::get('/list-payment-assets', 'listPayment');
        Route::get('/risk-payment-assets', 'riskPayment');
        Route::get('/control-payment-assets', 'controlPayment');
        Route::get('/list-pci-assets', 'listPci');
        Route::get('/risk-pci-assets', 'riskPci');
        Route::get('/control-pci-assets', 'controlPci');
        Route::get('/list-e-commerce-assets', 'listEcom');
        Route::get('/risk-e-commerce-assets', 'riskEcom');
        Route::get('/control-e-commerce-assets', 'controlEcom');
        Route::get('/list-e-banking-assets', 'listEbank');
        Route::get('/risk-e-banking-assets', 'riskEbank');
        Route::get('/control-e-banking-assets', 'controlEbank');
        Route::get('/mis-risk-register', 'riskReg');
        Route::get('/list-implemented-controls', 'controlImple');
        Route::get('/list-not-implemented-controls', 'controlNotImple');
        Route::get('/list-pending-controls', 'controlPending');
    });
});


Route::get('/asset-smart-search', [AssetSmartSearch::class, 'show'])->name('asset.smart.search');


Route::get('/hr-experts', [HumanResourceController::class, 'show'])->name('hr.expert');
Route::get('/hr-experts/upload', [DataUploaderController::class, 'createHr'])->name('hr.upload');
Route::post('/hr-experts/upload', [DataUploaderController::class, 'UploadHr'])->name('hr.upload.store');




// Protected routes




Route::get('/data-governance', function () {
    return view('process/17-GrcDomain/data-governance');
});
Route::get('/data-catalog', function () {
    return view('process/17-GrcDomain/data-catalog');
});
Route::get('/data-quality', function () {
    return view('process/17-GrcDomain/data-quality');
});
Route::get('/data-operations', function () {
    return view('process/17-GrcDomain/data-operations');
});
Route::get('/document-content-management', function () {
    return view('process/17-GrcDomain/document-content-management');
});
Route::get('/data-architecture-modeling', function () {
    return view('process/17-GrcDomain/data-architecture-modeling');
});
Route::get('/reference-master-data-management', function () {
    return view('process/17-GrcDomain/reference-master-data-management');
});
Route::get('/business-intelligence-analytics', function () {
    return view('process/17-GrcDomain/business-intelligence-analytics');
});
Route::get('/data-sharing-interoperability', function () {
    return view('process/17-GrcDomain/data-sharing-interoperability');
});
Route::get('/data-value-realization', function () {
    return view('process/17-GrcDomain/data-value-realization');
});
Route::get('/open-data', function () {
    return view('process/17-GrcDomain/open-data');
});
Route::get('/freedom-information', function () {
    return view('process/17-GrcDomain/freedom-information');
});
Route::get('/data-classification', function () {
    return view('process/17-GrcDomain/data-classification');
});
Route::get('/personal-data-protection', function () {
    return view('process/17-GrcDomain/personal-data-protection');
});
Route::get('/data-security-protection', function () {
    return view('process/17-GrcDomain/data-security-protection');
});



Route::view('/cs-induction', 'process/1-CsInduction');

Route::prefix('cs-induction')->group(function () {
    Route::view('/cybersecurity-governance', 'process/17-GrcDomain/1-CybersecurityStrategyCsIndu');
    Route::view('/cybersecurity-strategy', 'process/17-GrcDomain/2-CybersecurityManagementCsIndu');
    Route::view('/cybersecurity-policies', 'process/17-GrcDomain/3-CybersecurityPoliciesAndProcedureCsIndu');
    Route::view('/cybersecurity-roles-and-responsibilities', 'process/17-GrcDomain/4-CybersecurityRiskManagementCsIndu');
    Route::view('/cybersecurity-project-management', 'process/17-GrcDomain/5-CybersecurityItProjectManagementCsIndu');
    Route::view('/cybersecurity-awareness', 'process/17-GrcDomain/6-ComplianceCybersecurityStandardCsIndu');
    Route::view('/cybersecurity-review', 'process/17-GrcDomain/7-CybersecurityAssetManagementCsIndu');
    Route::view('/cybersecurity-audit', 'process/17-GrcDomain/8-IdentityAccessManagementCsIndu');
    Route::view('/human-resources', 'process/17-GrcDomain/9-InformationSystemProcessingCsIndu');
    Route::view('/physical-security', 'process/17-GrcDomain/10-EmailProtectionCsIndu');

    Route::view('/asset-management', 'process/17-GrcDomain/11-NetworkSecurityManagementCsIndu');
    Route::view('/cybersecurity-architecture', 'process/17-GrcDomain/12-MobileDeviceSecurityCsIndu');
    Route::view('/identity-and-access-management', 'process/17-GrcDomain/13-DataInformationSecurityCsIndu');
    Route::view('/change-management', 'process/17-GrcDomain/15-BackupRecoveryManagementCsIndu');
    Route::view('/infrastructure-security', 'process/17-GrcDomain/16-VulnerabilitManagementCsIndu');
    Route::view('/cryptography', 'process/17-GrcDomain/17-PenetrationTestingCsIndu');
    Route::view('/bring-your-own-device', 'process/17-GrcDomain/18-CybersecurityEventLogsCsIndu');
    Route::view('/secure-disposal', 'process/17-GrcDomain/19-CybersecurityIncidentManagementCsIndu');
    Route::view('/payment-system', 'process/17-GrcDomain/20-PhysicalSecurityCsIndu');
    Route::view('/electronic-banking', 'process/17-GrcDomain/21-WebApplicationSecurityCsIndu');

    Route::view('/cybersecurity-event-management', 'process/17-GrcDomain/22-CybersecurityResilienceCsIndu');
    Route::view('/cybersecurity-incident-management', 'process/17-GrcDomain/23-ThirdPartyCybersecurityCsIndu');
    Route::view('/threat-management', 'process/17-GrcDomain/24-CloudComputingCsIndu');
    Route::view('/vulnerability-management', 'process/17-GrcDomain/25-IndustrialControlsCsIndu');
    Route::view('/contract-and-vendor', 'process/17-GrcDomain/26-ChangeManagementCsIndu');
    Route::view('/outsourcing', 'process/17-GrcDomain/27-SecureDataDisposalCsIndu');
    Route::view('/cloud-computing', 'process/17-GrcDomain/31-CloudComputingCsIndu');
    Route::view('/cybersecurity-training', 'process/17-GrcDomain/28-PeriodicalCybersecurityReviewCsIndu');
    Route::view('/cybersecurity-risk-management', 'process/17-GrcDomain/29-CybersecurityHRCsIndu');
    Route::view('/cybersecurity-regulatory-compliance', 'process/17-GrcDomain/30-CybersecurityAwarenessTrainingCsIndu');
});







Route::get('/process', [ProcessController::class, 'index']);
Route::get('/process/{process:process_id}', [ProcessController::class, 'show'])->name('process.view.show');
Route::get('/resource/{process:process_id}/videos/', [ProcessResourceController::class, 'videos'])->name('process.resource.videos');
Route::get('/video/stream/{resource}', [ProcessResourceController::class, 'stream'])->name('secure.video.stream');

Route::get('/resource/{process:process_id}/checklist/', [ProcessResourceController::class, 'checklist'])->name('process.resource.checklist');
Route::get('/resource/{process:process_id}/template/', [ProcessResourceController::class, 'template'])->name('process.resource.template');
Route::get('/resource/template/{resource}', [ProcessResourceController::class, 'pdfTemplate'])->name('process.resource.template.pdf');
Route::get('/resource/{process:process_id}/glossary/', [ProcessResourceController::class, 'glossary'])->name('process.resource.glossary');
Route::delete('/resources/{resource}', [ProcessResourceController::class, 'destroy'])->name('process.resource.destroy');



// Hot Topics

Route::get('/hot-topics', function () {
    return view('6-HotTopics/HotTopics');
});

Route::prefix('hot-topics')->group(function () {
    Route::view('/compliance-challenges', '6-HotTopics/compliance-challenges');
    Route::view('/key-performance-indicator', '6-HotTopics/key-performance-indicator');
    Route::view('/essential-kpis-kris', '6-HotTopics/essential-kpis-kris');
    Route::view('/risk-management-methodologies', '6-HotTopics/risk-management-methodologies');
    Route::view('/control-assessment-risk-assessment', '6-HotTopics/control-assessment-risk-assessment');
    Route::view('/26-essential-items-checklist-awareness-topics', '6-HotTopics/26-essential-items-checklist-awareness-topics');
    Route::view('/enhancing-staff-knowledge-skill', '6-HotTopics/enhancing-staff-knowledge-skill');
    Route::view('/asset-inventory-configuration-management-database', '6-HotTopics/asset-inventory-configuration-management-database');
    Route::view('/essential-practical-cryptographic-deployment', '6-HotTopics/essential-practical-cryptographic-deployment');
    Route::view('/data-information', '6-HotTopics/data-information');
    Route::view('/selecting-va-pen-tester', '6-HotTopics/selecting-va-pen-tester');
    Route::view('/incident-management-cybersecurity-incident-management', '6-HotTopics/incident-management-cybersecurity-incident-management');
    Route::view('/review-vs-audit', '6-HotTopics/review-vs-audit');
});

// CISO Education

Route::get('/ciso-education', function () {
    return view('5-CISOEducation/CisoEducation');
});

Route::prefix('ciso-education')->group(function () {
    Route::view('/applying-cissp-knowledge-in-ksa', '5-CISOEducation/cissp');
    Route::view('/applying-cism-knowledge-in-ksa', '5-CISOEducation/cism');
    Route::view('/applying-cgeit-knowledge-in-ksa', '5-CISOEducation/cgeit');
    Route::view('/applying-pmp-knowledge-in-ksa', '5-CISOEducation/pmp');
    Route::view('/applying-agile-approach', '5-CISOEducation/agile');
});


// Products

Route::get('/product', function () {
    return view('process/15-ProductSupplier/1-ProductMasterForm');
});


Route::prefix('products')->group(function () {
    Route::view('/anti-phishing-software', 'process/15-ProductSupplier/products/anti-phishing-software');
    Route::view('/anti-ransomware-software', 'process/15-ProductSupplier/products/anti-ransomware-software');
    Route::view('/application-whitelisting', 'process/15-ProductSupplier/products/application-whitelisting');
    Route::view('/backup-recovery', 'process/15-ProductSupplier/products/backup-recovery');
    Route::view('/brand-protection', 'process/15-ProductSupplier/products/brand-protection');
    Route::view('/casb', 'process/15-ProductSupplier/products/casb');
    Route::view('/container-kubernetes-security', 'process/15-ProductSupplier/products/container-kubernetes-security');
    Route::view('/data-classification', 'process/15-ProductSupplier/products/data-classification');
    Route::view('/data-loss-prevention', 'process/15-ProductSupplier/products/data-loss-prevention');
    Route::view('/database-activity-monitoring', 'process/15-ProductSupplier/products/database-activity-monitoring');
    Route::view('/distributed-denial-of-service-of-attack', 'process/15-ProductSupplier/products/distributed-denial-of-service-of-attack');
    Route::view('/email-security', 'process/15-ProductSupplier/products/email-security');
    Route::view('/encryption', 'process/15-ProductSupplier/products/encryption');
    Route::view('/end-point-detection-response', 'process/15-ProductSupplier/products/end-point-detection-response');
    Route::view('/extended-detection-protection-response', 'process/15-ProductSupplier/products/extended-detection-protection-response');
    Route::view('/identity-access-management', 'process/15-ProductSupplier/products/identity-access-management');
    Route::view('/iot-security', 'process/15-ProductSupplier/products/iot-security');
    Route::view('/multi-factor-authentication', 'process/15-ProductSupplier/products/multi-factor-authentication');
    Route::view('/network-access-control', 'process/15-ProductSupplier/products/network-access-control');
    Route::view('/next-generation-firewall', 'process/15-ProductSupplier/products/next-generation-firewall');
    Route::view('/penetration-testing', 'process/15-ProductSupplier/products/penetration-testing');
    Route::view('/privilege-access-management', 'process/15-ProductSupplier/products/privilege-access-management');
    Route::view('/siem-solution', 'process/15-ProductSupplier/products/siem-solution');
    Route::view('/threat-intelligence', 'process/15-ProductSupplier/products/threat-intelligence');
    Route::view('/unified-threat-management', 'process/15-ProductSupplier/products/unified-threat-management');
    Route::view('/user-entity-behavior-analytics', 'process/15-ProductSupplier/products/user-entity-behavior-analytics');
    Route::view('/web-application-firewall', 'process/15-ProductSupplier/products/web-application-firewall');
    Route::view('/wifi-security', 'process/15-ProductSupplier/products/wifi-security');
    Route::view('/zero-day-attack', 'process/15-ProductSupplier/products/zero-day-attack');
    Route::view('/zero-trust', 'process/15-ProductSupplier/products/zero-trust');
});

// ISO-27001
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



Route::get('/generate-ppt', [PresentationController::class, 'generateChart'])->name('generate.ppt');
Route::get('/pen-test-generate-ppt/{va_pt_test_id}', [PresentationController::class, 'generatePenTestChart'])->name('pen-test.generate.ppt');



// Asset Data Uploader
Route::get('/upload-assets', [DataUploaderController::class, 'create'])->name('upload.assets.create');
Route::post('/upload-assets', [DataUploaderController::class, 'uploadAssets'])->name('upload.assets.store');


// Owner Data Uploader
Route::get('/upload-owners', [DataUploaderController::class, 'createOwner'])->name('upload.owner.create');
Route::post('/upload-owners', [DataUploaderController::class, 'uploadOwners'])->name('upload.owners.store');

// Custodian Data Uploader
Route::get('/upload-custodians', [DataUploaderController::class, 'createCustodian'])->name('upload.custodians.create');
Route::post('/upload-custodians', [DataUploaderController::class, 'uploadCustodian'])->name('upload.custodians.store');

// Artifact Data Uploader
Route::get('/upload-artifacts', [DataUploaderController::class, 'createArtifact'])->name('upload.artifact.create');
Route::post('/upload-artifacts', [DataUploaderController::class, 'uploadArtifact'])->name('upload.artifact.store');

Route::resource('objectives', ObjectivesController::class)->except(['destroy']);
Route::delete('/objectives/delete', [ObjectivesController::class, 'destroy'])->name('objectives.destroy');
