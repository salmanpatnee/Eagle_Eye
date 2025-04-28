<?php

use App\Exports\ControlsExport;
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
use App\Http\Controllers\RiskTreatmentTableController;
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
use App\Http\Controllers\Location;
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
use App\Http\Controllers\FileUploadController;
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
use App\Http\Controllers\CMSController;
use App\Http\Controllers\DataUploaderController;
use App\Http\Controllers\ExportController;
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
use App\Http\Controllers\SamaRegulatoryReportController;
use App\Http\Controllers\ThirdPartyController;
use App\Http\Controllers\TPTExpertsControl;
use App\Models\ControlMaster;
use App\Models\UserRole;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\IOFactory;

Route::get('/insert-record', function () {
    $controlIds = ControlMaster::where('control_reference', 'NCA-DCC')->where('control_id', 'LIKE', 'NCA-DCC-3-1owner-controls/1-1.STRG-OWNR?status=null%')->get()->pluck('control_id');
    // $controlIds = ControlMaster::where('control_reference', 'NCA-DCC')->get()->pluck('control_id');
    // return $controlIds;

    foreach ($controlIds as $controlId) {
        // DB::table('control_master_table_vs_custodian_role_table')->insert([
        //     'control_id' => $controlId,
        //     'custodian_id' => '1-2.MNGT-CSTD'
        // ]);

        DB::table('control_master_table_vs_custodian_role_table')
            ->where('control_id', $controlId)
            ->update([
                'custodian_id' => '3-1.BCM-CSTD'
            ]);
    }
    return "Done";
    return $controlIds;
});

Route::middleware(['guest'])->group(function () {

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    // Title Page
    Route::get('/', function () {
        return view('1-Title.1-TitlePage');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('login.destroy');


    // Route::post('/att', [ArtifactController::class, 'add'])->name('att.store');

    // Three Ps
    Route::get('/vciso', function () {
        return view('2-ThreePs.1-ThreePs');
    });

    Route::get('/users', [UserController::class, 'index'])->name('users.index');


    Route::get('/control-smart-search', [ControlSmartSearch::class, 'index'])->name('control.smart.search.index');






    // Experts
    Route::controller(ExpertController::class)->group(function () {
        Route::get('/people', 'index')->name('experts.index');
        Route::get('/expert-input', 'view');
        Route::post('/expert-input/post', 'store');
        // Route::delete('/risk-identification/delete', 'delete')->name('delete.riskident');
        // Route::get('/risk-identification-table/{risk_id}', 'show');
    });

    // Process





    Route::get('/compliance', function () {
        return view('4-Process/1-compliance');
    });

    Route::get('/compliance-v2', function () {
        return view('4-Process/1-compliance-v2');
    })->name('compliance');

    Route::get('/compliance-v3', function () {
        $roles = UserRole::all();

        return view('4-Process/1-compliance-v3', compact('roles'));
    })->name('compliance');

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

    Route::get('/home', function () {
        return view('2-ThreePs/2-HomePage');
    })->name('home');


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





    // ------------------- INITIAL SETUP -------------------
    //     ├── Organization Management
    //     ├── Location Management
    //     └── Department Management
    //     └── Sub-Department Management
    //     └── Classification Management
    //     └── Category Management
    //     └── Sub-Category Management
    //     └── Best practice Management
    //     └── Domain Management
    //     └── Sub-Domain Management
    //     └── User Management
    //     └── Options
    // -----------------------------------------------------

    Route::controller(OrganizationController::class)->group(function () {
        Route::get('/organizations', 'index')->name('organizations.index');
        Route::get('/organizations/create', 'create')->name('organizations.create');
        Route::get('/organizations/{organization}', 'show')->name('organizations.show');
        Route::post('/organizations', 'store')->name('organizations.store');
        Route::get('/organizations/edit/{organization}', 'edit')->name('organizations.edit');
        Route::put('/organizations/{organization}', 'update')->name('organizations.update');
        Route::delete('/organizations', 'destroy')->name('organizations.destroy');
    });


    Route::controller(LocationController::class)->group(function () {
        Route::get('/locations', 'index')->name('locations.index');
        Route::get('/locations/create', 'create')->name('locations.create');
        Route::get('/locations/{location}', 'show')->name('locations.show');
        Route::post('/locations', 'store')->name('locations.store');
        Route::get('/locations/edit/{location}', 'edit')->name('locations.edit');
        Route::put('/location/{location}', 'update')->name('locations.update');
        Route::delete('/locations', 'destroy')->name('locations.destroy');
    });


    Route::controller(DepartmentController::class)->group(function () {
        Route::get('/departments', 'index')->name('departments.index');
        Route::get('/departments/create', 'create')->name('departments.create');
        Route::get('/departments/{department}', 'show')->name('departments.show');
        Route::post('/departments', 'store')->name('departments.store');
        Route::get('/departments/edit/{department}', 'edit')->name('departments.edit');
        Route::put('/department/{department}', 'update')->name('departments.update');
        Route::delete('/departments', 'destroy')->name('departments.destroy');
    });


    Route::controller(SubDepartmentController::class)->group(function () {
        Route::get('/sub-departments', 'index')->name('sub-departments.index');
        Route::get('/sub-departments/create', 'create')->name('sub-departments.create');
        Route::get('/sub-departments/{subDepartment}', 'show')->name('sub-departments.show');
        Route::post('/sub-departments', 'store')->name('sub-departments.store');
        Route::get('/sub-departments/edit/{subDepartment}', 'edit')->name('sub-departments.edit');
        Route::put('/sub-departments/{subDepartment}', 'update')->name('sub-departments.update');
        Route::delete('/sub-departments', 'destroy')->name('sub-departments.destroy');
    });


    Route::controller(ClassificationController::class)->group(function () {
        Route::get('/classifications', 'index')->name('classifications.index');
        Route::get('/classifications/create', 'create')->name('classifications.create');
        Route::get('/classifications/{classification}', 'show')->name('classifications.show');
        Route::post('/classifications', 'store')->name('classifications.store');
        Route::get('/classifications/edit/{classification}', 'edit')->name('classifications.edit');
        Route::put('/classifications/{classification}', 'update')->name('classifications.update');
        Route::delete('/classifications', 'destroy')->name('classifications.destroy');
    });


    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories.index');
        Route::get('/categories/create', 'create')->name('categories.create');
        Route::get('/categories/{category}', 'show')->name('categories.show');
        Route::post('/categories', 'store')->name('categories.store');
        Route::get('/categories/edit/{category}', 'edit')->name('categories.edit');
        Route::put('/categories/{category}', 'update')->name('categories.update');
        Route::delete('/categories', 'destroy')->name('categories.destroy');
    });

    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/sub-categories', 'index')->name('sub-categories.index');
        Route::get('/sub-categories/create', 'create')->name('sub-categories.create');
        Route::get('/sub-categories/{subCategory}', 'show')->name('sub-categories.show');
        Route::post('/sub-categories', 'store')->name('sub-categories.store');
        Route::get('/sub-categories/edit/{subCategory}', 'edit')->name('sub-categories.edit');
        Route::put('/sub-categories/{subCategory}', 'update')->name('sub-categories.update');
        Route::delete('/sub-categories', 'destroy')->name('sub-categories.destroy');
    });

    Route::controller(BestPracticeController::class)->group(function () {
        Route::get('/best-practices', 'index')->name('best-practices.index');
        Route::get('/best-practices/create', 'create')->name('best-practices.create');
        Route::get('/best-practices/{bestPractice}', 'show')->name('best-practices.show');
        Route::post('/best-practices', 'store')->name('best-practices.store');
        Route::get('/best-practices/edit/{bestPractice}', 'edit')->name('best-practices.edit');
        Route::put('/best-practices/{bestPractice}', 'update')->name('best-practices.update');
        Route::delete('/best-practices', 'destroy')->name('best-practices.destroy');
    });

    Route::controller(MainDomainController::class)->group(function () {
        Route::get('/domains', 'index')->name('domains.index');
        Route::get('/domains/create', 'create')->name('domains.create');
        Route::get('/domains/{domain}', 'show')->name('domains.show');
        Route::post('/domains', 'store')->name('domains.store');
        Route::get('/domains/edit/{domain}', 'edit')->name('domains.edit');
        Route::put('/domains/{domain}', 'update')->name('domains.update');
        Route::delete('/domains', 'destroy')->name('domains.destroy');
    });

    Route::controller(SubDomainController::class)->group(function () {
        Route::get('/sub-domains', 'index')->name('sub-domains.index');
        Route::get('/sub-domains/create', 'create')->name('sub-domains.create');
        Route::get('/sub-domains/{subDomain}', 'show')->name('sub-domains.show');
        Route::post('/sub-domains', 'store')->name('sub-domains.store');
        Route::get('/sub-domains/edit/{subDomain}', 'edit')->name('sub-domains.edit');
        Route::put('/sub-domains/{subDomain}', 'update')->name('sub-domains.update');
        Route::delete('/sub-domains', 'destroy')->name('sub-domains.destroy');
    });

    Route::middleware(['auth'])->group(function () {

        Route::middleware('superadmin')->group(function () {
            Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/users', [UserController::class, 'store'])->name('users.store');
            Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
            Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/users', [UserController::class, 'destroy'])->name('users.destroy');

            Route::get('/options', [OptionsController::class, 'create'])->name('options.create');
            Route::patch('/options', [OptionsController::class, 'update'])->name('options.update');
        });

        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    });

    // ------------Owner--------------

    Route::controller(OwnerController::class)->group(function () {
        Route::get('/owner-list', 'index')->name('ownerreg.index');
        Route::get('/owner-table/{owner:owner_id}', 'show')->name('ownerreg.show');
        Route::get('/owner-input', 'create')->name('ownerreg.create');
        Route::get('/owner/edit/{id}', 'edit')->name('ownerreg.edit');
        Route::post('/owner', 'store')->name('ownerreg.store');
        Route::put('/owner/{owner}', 'update')->name('ownerreg.update');
        Route::delete('/owner/delete', 'delete')->name('ownerreg.delete');
    });

    // ------------Owner Role--------------

    Route::controller(OwnerRoleController::class)->group(function () {
        Route::get('/owner-role-list', 'index')->name('ownerrole.index');
        Route::get('/owner-role-table/{owner_role_id}', 'show')->name('ownerrole.show');
        Route::get('/owner-role-input', 'create')->name('ownerrole.create');
        Route::get('/owner-role/edit/{id}', 'edit')->name('ownerrole.edit');
        Route::post('/owner-role', 'store')->name('ownerrole.store');
        Route::put('/owner-role/{ownerRole}', 'update')->name('ownerrole.update');
        Route::delete('/owner-role/delete', 'delete')->name('ownerrole.delete');
    });

    // ------------Custodian Role--------------


    Route::controller(CustodianRoleController::class)->group(function () {
        Route::get('/custodian-role-list', 'index')->name('custodianrole.index');
        Route::get('/custodian-role-table/{owner_role_id}', 'show')->name('custodianrole.show');
        Route::get('/custodian-role-input', 'create')->name('custodianrole.create');
        Route::get('/custodian-role/edit/{id}', 'edit')->name('custodianrole.edit');
        Route::post('/custodian-role', 'store')->name('custodianrole.store');
        Route::put('/custodian-role/{custodian}', 'update')->name('custodianrole.update');
        Route::delete('/custodian-role/delete', 'delete')->name('custodianrole.delete');
    });

    // ------------Custodian Name--------------


    Route::controller(CustodianController::class)->group(function () {
        Route::get('/custodian-list', 'index')->name('custodian.index');
        Route::get('/custodian-table/{custodian:custodian_name_id}', 'show')->name('custodian.show');
        Route::get('/custodian-input', 'create')->name('custodian.create');
        Route::get('/custodian/edit/{id}', 'edit')->name('custodian.edit');
        Route::post('/custodian', 'store')->name('custodian.store');
        Route::put('/custodian/{custodian}', 'update')->name('custodian.update');
        Route::delete('/custodian/delete', 'delete')->name('custodian.delete');
    });


    // Asset

    // ------------Asset Register--------------


    Route::controller(AssetRegisterController::class)->group(function () {
        Route::get('/asset-register-list', 'index')->name('assetreg.index');
        Route::get('/asset-register-table/{asset:asset_id}', 'show')->name('assetreg.show');
        Route::get('/asset-register-input', 'create')->name('assetreg.create');
        Route::get('/asset-register/edit/{asset:asset_id}', 'edit')->name('assetreg.edit');
        Route::post('/asset-register', 'store')->name('assetreg.store');
        Route::put('/asset-register/{asset:asset_id}', 'update')->name('assetreg.update');
        Route::delete('/asset-register/delete', 'delete')->name('assetreg.delete');
    });

    // ------------Asset Status--------------


    Route::controller(AssetStatusController::class)->group(function () {
        Route::get('/asset-status-list', 'index')->name('assetstatus.index');
        Route::get('/asset-status-table/{asset_status_id}', 'show')->name('assetstatus.show');
        Route::get('/asset-status-input', 'create')->name('assetstatus.create');
        Route::get('/asset-status/edit/{id}', 'edit')->name('assetstatus.edit');
        Route::post('/asset-status', 'store')->name('assetstatus.store');
        Route::put('/asset-status/{assetStatus}', 'update')->name('assetstatus.update');
        Route::delete('/asset-status/delete', 'delete')->name('assetstatus.delete');
    });


    // ------------Asset Type--------------


    Route::controller(AssetTypeController::class)->group(function () {
        Route::get('/asset-type-list', 'index')->name('assettype.index');
        Route::get('/asset-type-table/{asset_type_id}', 'show')->name('assettype.show');
        Route::get('/asset-type-input', 'create')->name('assettype.create');
        Route::get('/asset-type/edit/{id}', 'edit')->name('assettype.edit');
        Route::post('/asset-type', 'store')->name('assettype.store');
        Route::put('/asset-type/{asset_type_id}', 'update')->name('assettype.update');
        Route::delete('/asset-type/delete', 'delete')->name('assettype.delete');
    });



    // ------------Asset Sub-Type--------------


    Route::controller(AssetSubTypeController::class)->group(function () {
        Route::get('/asset-sub-type-list', 'index')->name('assetsubtype.index');
        Route::get('/asset-sub-type-table/{asset_sub_type_id}', 'show')->name('assetsubtype.show');
        Route::get('/asset-sub-type-input', 'create')->name('assetsubtype.create');
        Route::get('/asset-sub-type/edit/{id}', 'edit')->name('assetsubtype.edit');
        Route::post('/asset-sub-type', 'store')->name('assetsubtype.store');
        Route::put('/asset-sub-type/{assetSubType}', 'update')->name('assetsubtype.update');
        Route::delete('/asset-sub-type/delete', 'delete')->name('assetsubtype.delete');
    });


    // Asset Group


    Route::controller(AssetGroupController::class)->group(function () {
        Route::get('/asset-group-list', 'index')->name('assetgroup.index');
        Route::get('/asset-group-table/{assetGroup:asset_group_id}', 'show')->name('assetgroup.show');
        Route::get('/asset-group-input', 'create')->name('assetgroup.create');
        Route::get('/asset-group/edit/{assetGroup:asset_group_id}', 'edit')->name('assetgroup.edit');
        Route::post('/asset-group', 'store')->name('assetgroup.store');
        Route::put('/asset-group/{assetGroup}', 'update')->name('assetgroup.update');
        Route::delete('/asset-group/delete', 'delete')->name('assetgroup.delete');
    });

    // Threat


    // ------------Threat Agent--------------


    Route::controller(ThreatAgentController::class)->group(function () {
        Route::get('/threat-agent-list', 'index')->name('threatagent.index');
        Route::get('/threat-agent-table/{threatAgent:threat_agent_id}', 'show')->name('threatagent.show');
        Route::get('/threat-agent-input', 'create')->name('threatagent.create');
        Route::get('/threat-agent/edit/{id}', 'edit')->name('threatagent.edit');
        Route::post('/threat-agent', 'store')->name('threatagent.store');
        Route::put('/threat-agent/{threatAgent}', 'update')->name('threatagent.update');
        Route::delete('/threat-agent/delete', 'delete')->name('threatagent.delete');
    });


    // ------------Threat Agent Type--------------


    Route::controller(ThreatAgentTypeController::class)->group(function () {
        Route::get('/threat-agent-type-list', 'index')->name('threattype.index');
        Route::get('/threat-agent-type-table/{threat_agent_type_id}', 'show')->name('threattype.show');
        Route::get('/threat-agent-type-input', 'create')->name('threattype.create');
        Route::get('/threat-agent-type/edit/{id}', 'edit')->name('threattype.edit');
        Route::post('/threat-agent-type', 'store')->name('threattype.store');
        Route::put('/threat-agent-type/{threatAgentType}', 'update')->name('threattype.update');
        Route::delete('/threat-agent-type/delete', 'delete')->name('threattype.delete');
    });


    // ------------Threat Agent Sub-Type--------------


    Route::controller(ThreatAgentSubTypeController::class)->group(function () {
        Route::get('/threat-agent-sub-type-list', 'index')->name('threatsubtype.index');
        Route::get('/threat-agent-sub-type-table/{threatAgentSubType:threat_agent_sub_type_id}', 'show')->name('threatsubtype.show');
        Route::get('/threat-agent-sub-type-input', 'create')->name('threatsubtype.create');
        Route::get('/threat-agent-sub-type/edit/{id}', 'edit')->name('threatsubtype.edit');
        Route::post('/threat-agent-sub-type', 'store')->name('threatsubtype.store');
        Route::put('/threat-agent-sub-type/{threatAgentSubType}', 'update')->name('threatsubtype.update');
        Route::delete('/threat-agent-sub-type/delete', 'delete')->name('threatsubtype.delete');
    });


    // ------------Threat Agent Rating--------------


    Route::controller(ThreatAgentRatingController::class)->group(function () {
        Route::get('/threat-agent-rating-list', 'index')->name('threatrating.index');
        Route::get('/threat-agent-rating-table/{threat_agent_rating_id}', 'show')->name('threatrating.show');
        Route::get('/threat-agent-rating-input', 'create')->name('threatrating.create');
        Route::get('/threat-agent-rating/edit/{id}', 'edit')->name('threatrating.edit');
        Route::post('/threat-agent-rating', 'store')->name('threatrating.store');
        Route::put('/threat-agent-rating/{threatAgentRating}', 'update')->name('threatrating.update');
        Route::delete('/threat-agent-rating/delete', 'delete')->name('threatrating.delete');
    });

    // ------------Threat Agent Vector--------------


    Route::controller(ThreatAgentVectorController::class)->group(function () {
        Route::get('/threat-agent-vector-list', 'index')->name('threatvector.index');
        Route::get('/threat-agent-vector-table/{threat_agent_vector_id}', 'show')->name('threatvector.show');;
        Route::get('/threat-agent-vector-input', 'create')->name('threatvector.create');
        Route::get('/threat-agent-vector/edit/{id}', 'edit')->name('threatvector.edit');
        Route::post('/threat-agent-vector', 'store')->name('threatvector.store');
        Route::put('/threat-agent-vector/{agentVector}', 'update')->name('threatvector.update');
        Route::delete('/threat-agent-vector/delete', 'delete')->name('threatvector.delete');
    });


    // Vulnerability


    // ------------Vulnerability Master--------------

    Route::controller(VaMasterController::class)->group(function () {
        Route::get('/va-list', 'index')->name('va.index');
        Route::get('/va-table/{vulnerability:va_id}', 'show')->name('va.show');
        Route::get('/va-input', 'create')->name('va.create');
        Route::get('/va/edit/{id}', 'edit')->name('va.edit');
        Route::post('/va', 'store')->name('va.store');
        Route::put('/va/{vulnerability}', 'update')->name('va.update');
        Route::delete('/va/delete', 'delete')->name('va.delete');
    });

    // ------------Vulnerability CVE--------------


    Route::controller(RiskCveController::class)->group(function () {
        Route::get('/cve-list', 'index')->name('cve.index');
        Route::get('/cve-table/{cve_id}', 'show');
        Route::get('/cve-input', 'create')->name('cve.create');
        Route::get('/cve/edit/{id}', 'edit')->name('cve.edit');
        Route::post('/cve', 'storeOrUpdate')->name('cve.store');
        Route::put('/cve/{id}', 'storeOrUpdate')->name('cve.update');
        Route::delete('/cve/delete', 'delete')->name('delete.cve');
    });

    // ------------Vulnerability CVSS--------------


    Route::controller(CvssController::class)->group(function () {
        Route::get('/cvss-list', 'index')->name('cvss.index');
        Route::get('/cvss-table/{cvss_id}', 'show');
        Route::get('/cvss-input', 'create')->name('cvss.create');
        Route::get('/cvss/edit/{id}', 'edit')->name('cvss.edit');
        Route::post('/cvss', 'storeOrUpdate')->name('cvss.store');
        Route::put('/cvss/{id}', 'storeOrUpdate')->name('cvss.update');
        Route::delete('/cvss/delete', 'delete')->name('delete.cvss');
    });

    // ------------Vulnerability Type--------------


    Route::controller(VaTypeController::class)->group(function () {
        Route::get('/va-types-list', 'index')->name('vatype.index');
        Route::get('/va-types-table/{va_type_id}', 'show')->name('vatype.show');
        Route::get('/va-types-input', 'create')->name('vatype.create');
        Route::get('/va-type/edit/{id}', 'edit')->name('vatype.edit');
        Route::post('/va-type', 'store')->name('vatype.store');
        Route::put('/va-type/{vulnerabilityType}', 'update')->name('vatype.update');
        Route::delete('/va-type/delete', 'delete')->name('vatype.delete');
    });


    // ------------Vulnerability Sub-Type--------------


    Route::controller(VaSubTypeController::class)->group(function () {
        Route::get('/va-sub-type-list', 'index')->name('vasubtype.index');
        Route::get('/va-sub-type-table/{vulnerabilitySubType:va_sub_type_id}', 'show')->name('vasubtype.show');
        Route::get('/va-sub-type-input', 'create')->name('vasubtype.create');
        Route::get('/va-sub-type/edit/{id}', 'edit')->name('vasubtype.edit');
        Route::post('/va-sub-type', 'store')->name('vasubtype.store');
        Route::put('/va-sub-type/{vulnerabilitySubType}', 'update')->name('vasubtype.update');
        Route::delete('/va-sub-type/delete', 'delete')->name('vasubtype.delete');
    });



    // Risk

    // ------------Risk Identification--------------


    Route::controller(RiskIdentificationController::class)->group(function () {
        Route::get('/risk-identification-list', 'index')->name('riskmaster.index');
        Route::get('/risk-identification-table/{risk:risk_id}', 'show')->name('riskmaster.show');
        Route::get('/risk-identification-input', 'create')->name('riskmaster.create');
        Route::get('/risk-identification/edit/{risk:risk_id}', 'edit')->name('riskmaster.edit');
        Route::post('/risk-identification', 'store')->name('riskmaster.store');
        Route::put('/risk-identification/{risk}', 'update')->name('riskmaster.update');
        Route::delete('/risk-identification/delete', 'delete')->name('riskmaster.delete');
    });


    // ------------Risk Methodology--------------

    Route::resource('risk-methodology', RiskMethodologyController::class)->except(['destroy']);
    Route::delete('/risk-methodology/delete', [RiskMethodologyController::class, 'destroy'])->name('risk-methodology.destroy');

    // Route::controller(RiskMethodologyController::class)->group(function () {
    //     Route::get('/risk-methodology-list', 'index')->name('riskmethod.index');
    //     Route::get('/risk-methodology-table/{riskMethodology:risk_methodology_id}', 'show')->name('riskmethod.show');;
    //     Route::get('/risk-methodology-input', 'create')->name('riskmethod.create');
    //     Route::get('/risk-methodology/edit/{riskmethod:risk_methodology_id}', 'edit')->name('riskmethod.edit');
    //     Route::post('/risk-methodology', 'store')->name('riskmethod.store');
    //     Route::put('/risk-methodology/{riskMethodology}', 'update')->name('riskmethod.update');
    //     Route::delete('/risk-methodology/delete', 'delete')->name('riskmethod.delete');
    // });


    // ------------Risk Type--------------


    Route::controller(RiskTypeController::class)->group(function () {
        Route::get('/risk-type-list', 'index')->name('risktype.index');
        Route::get('/risk-type-table/{risk_id}', 'show')->name('risktype.show');;
        Route::get('/risk-type-input', 'create')->name('risktype.create');
        Route::get('/risk-type/edit/{id}', 'edit')->name('risktype.edit');
        Route::post('/risk-type', 'store')->name('risktype.store');
        Route::put('/risk-type/{riskType}', 'update')->name('risktype.update');
        Route::delete('/risk-type/delete', 'delete')->name('risktype.delete');
    });


    // ------------Risk Sub-Type--------------


    Route::controller(RiskSubTypeController::class)->group(function () {
        Route::get('/risk-sub-type-list', 'index')->name('risksubtype.index');
        Route::get('/risk-sub-type-table/{riskSubType:risk_sub_type_id}', 'show')->name('risksubtype.show');;
        Route::get('/risk-sub-type-input', 'create')->name('risksubtype.create');
        Route::get('/risk-sub-type/edit/{riskSubType:risk_sub_type_id}', 'edit')->name('risksubtype.edit');
        Route::post('/risk-sub-type', 'store')->name('risksubtype.store');
        Route::put('/risk-sub-type/{riskSubType}', 'update')->name('risksubtype.update');
        Route::delete('/risk-sub-type/delete', 'delete')->name('risksubtype.delete');
    });


    // ------------Risk Group--------------


    Route::controller(RiskGroupController::class)->group(function () {
        Route::get('/risk-group-list', 'index')->name('riskgroup.index');
        Route::get('/risk-group-table/{riskGroup:risk_group_id}', 'show')->name('riskgroup.show');
        Route::get('/risk-group-input', 'create')->name('riskgroup.create');
        Route::get('/risk-group/edit/{id}', 'edit')->name('riskgroup.edit');
        Route::post('/risk-group', 'store')->name('riskgroup.store');
        Route::put('/risk-group/{riskGroup}', 'update')->name('riskgroup.update');
        Route::delete('/risk-group/delete', 'delete')->name('riskgroup.delete');
    });


    // ------------Risk KRI--------------


    Route::controller(RiskKriController::class)->group(function () {
        Route::get('/kri-list', 'index')->name('riskkri.index');
        Route::get('/kri-table/{risk_id}', 'show')->name('riskkri.show');
        Route::get('/kri-input', 'create')->name('riskkri.create');
        Route::get('/kri/edit/{id}', 'edit')->name('riskkri.edit');
        Route::post('/kri', 'store')->name('riskkri.store');
        Route::put('/kri/{keyRiskIndicator}', 'update')->name('riskkri.update');
        Route::delete('/kri/delete', 'delete')->name('riskkri.delete');
    });

    // ------------Risk KRI--------------


    Route::controller(RiskKpiController::class)->group(function () {
        Route::get('/kpi-list', 'index')->name('riskkpi.index');
        Route::get('/kpi-table/{risk_id}', 'show')->name('riskkpi.show');
        Route::get('/kpi-input', 'create')->name('riskkpi.create');
        Route::get('/kpi/edit/{id}', 'edit')->name('riskkpi.edit');
        Route::post('/kpi', 'store')->name('riskkpi.store');
        Route::put('/kpi/{keyPerformanceIndicator}', 'update')->name('riskkpi.update');
        Route::delete('/kpi/delete', 'delete')->name('riskkpi.delete');
    });

    // ------------Risk Treatment--------------


    Route::controller(RiskTreatmentOptionsController::class)->group(function () {
        Route::get('/risk-treatment-option-list', 'index')->name('risktreatment.index');
        Route::get('/risk-treatment-option-table/{risk_id}', 'show')->name('risktreatment.show');
        Route::get('/risk-treatment-option-input', 'create')->name('risktreatment.create');
        Route::get('/risk-treatment-option/edit/{id}', 'edit')->name('risktreatment.edit');
        Route::post('/risk-treatment-option', 'store')->name('risktreatment.store');
        Route::put('/risk-treatment-option/{riskTreatment}', 'update')->name('risktreatment.update');
        Route::delete('/risk-treatment-option/delete', 'delete')->name('risktreatment.delete');
    });


    // ------------Risk Appetite--------------


    // Route::resource('risk-appetites', RiskAppetiteController::class)->except(['destroy']);
    // Route::delete('/risk-appetites/delete', [RiskAppetiteController::class, 'destroy'])->name('risk-appetites.destroy');

    Route::controller(RiskAppetiteController::class)->group(function () {
        Route::get('/risk-appetites', 'index')->name('risk-appetites.index');
        Route::get('/risk-appetites/create', 'create')->name('risk-appetites.create');
        Route::get('/risk-appetites/{risk_appetite:risk_appetite_id}', 'show')->name('risk-appetites.show');
        Route::get('/risk-appetites/edit/{risk_appetite:risk_appetite_id}', 'edit')->name('risk-appetites.edit');
        // Route::post('/risk-appetite', 'storeOrUpdate')->name('RiskAppetite.store');
        Route::put('/risk-appetites/{risk_appetite:risk_appetite_id}', 'storeOrUpdate')->name('risk-appetites.update');
        Route::delete('/risk-appetites/delete', 'destroy')->name('risk-appetites.delete');
    });


    // ------------Risk Inherent--------------

    Route::controller(RiskInherentController::class)->group(function () {
        Route::get('/risk-inherent-list', 'index')->name('RiskInherent.index');
        Route::get('/risk-inherent-table/{risk_id}', 'show')->name('RiskInherent.show');
        Route::get('/risk-inherent-input', 'create')->name('RiskInherent.create');
        Route::get('/risk-inherent/edit/{id}', 'edit')->name('RiskInherent.edit');
        Route::post('/risk-inherent', 'store')->name('RiskInherent.store');
        Route::put('/risk-inherent/{riskInherent}', 'update')->name('RiskInherent.update');
        Route::delete('/risk-inherent/delete', 'delete')->name('RiskInherent.delete');
    });



    // ------------Risk Acceptance--------------


    Route::controller(RiskAcceptanceController::class)->group(function () {
        Route::post('/risk-acceptance-input/post', 'store')->name('risk-acceptance.store');
        Route::get('/risk-acceptance-input', 'view')->name('risk-acceptance.create');
        Route::get('/risk-acceptance-list', 'index')->name('risk-acceptance.index');
        Route::delete('/risk-acceptance/delete', 'delete')->name('risk-acceptance.delete');
        Route::get('/risk-acceptance-table/{riskAcceptance:risk_acceptance_id}', 'show')->name('risk-acceptance.show');
        Route::get('/risk-acceptance/edit/{riskAcceptance:risk_acceptance_id}', 'edit')->name('risk-acceptance.edit');
        Route::put('/risk-acceptance/{riskAcceptance}', 'update')->name('risk-acceptance.update');
    });


    // Control

    // ------------Control Identification--------------


    Route::controller(ControlController::class)->group(function () {
        Route::get('/control-identification-list', 'index')->name('controlmaster.index');
        Route::get('/control-identification-table/{control:control_id}', 'show')->name('controlmaster.show');
        Route::get('/control-identification-input', 'create')->name('controlmaster.create');
        Route::get('/control-identification/edit/{control:control_id}', 'edit')->name('controlmaster.edit');
        Route::post('/control-identification', 'store')->name('controlmaster.store');
        Route::put('/control-identification/{control}', 'update')->name('controlmaster.update');
        Route::delete('/control-identification/delete', 'delete')->name('controlmaster.delete');
    });


    // ------------Control Type--------------


    Route::controller(ControlTypeController::class)->group(function () {
        Route::get('/control-type-list', 'index')->name('controltype.index');
        Route::get('/control-type-table/{contro_type_id}', 'show')->name('controltype.show');
        Route::get('/control-type-input', 'create')->name('controltype.create');
        Route::get('/control-type/edit/{id}', 'edit')->name('controltype.edit');
        Route::post('/control-type', 'store')->name('controltype.store');
        Route::put('/control-type/{controlType}', 'update')->name('controltype.update');
        Route::delete('/control-type/delete', 'delete')->name('controltype.delete');
    });


    // Audit Plan


    Route::controller(AuditPlanController::class)->group(function () {
        Route::get('/audit-plan-list', 'index')->name('audits.index');
        Route::get('/audit-plan-table/{audit_id}', 'show')->name('audits.show');
        Route::post('/audit-plan-input/post', 'store')->name('audits.store');
        Route::get('/audit-plan-input', 'view')->name('audits.create');
        Route::get('/audit-plan/edit/{audit}', 'edit')->name('audits.edit');
        Route::patch('/audit-plan/{auditPlan:audit_id}', 'update')->name('audits.update');
        Route::delete('/audit-plan/delete', 'delete')->name('audits.delete');
    });

    // Audit Master

    Route::controller(AuditMaterController::class)->group(function () {
        Route::get('/audit-registration', 'index')->name('audit-registrations.index');
        Route::get('/audit-registration-table/{audit:audit_id}', 'show')->name('audit-registrations.show');
        Route::get('/audit-registration/create', 'create')->name('audit-registrations.create');

        Route::post('/audit-registration-input/post', 'store');
        Route::get('/audit-registration/{audit:audit_id}/edit', 'edit')->name('audit-registrations.edit');
        Route::patch('/audit-registration/{audit}', 'update')->name('audit-registrations.update');
        Route::delete('/audit-registration', 'destroy')->name('audit-registrations.destroy');

        // Route::delete('/audit-registration/delete', 'delete')->name('delete.auditMaster');
    });



    Route::controller(AuditFindingController::class)->group(function () {
        Route::get('/audit-findings/create/{audit:audit_id}', 'create')->name('audit-findings.create');
        Route::get('/audit-findings/{auditFinding:audit_finding_id}', 'show')->name('audit-findings.show');
        Route::post('/audit-findings/{audit:audit_id}', 'store')->name('audit-findings.store');
        Route::get('/audit-findings/{auditFinding:audit_finding_id}/edit', 'edit')->name('audit-findings.edit');
        Route::patch('/audit-findings/{auditFinding}', 'update')->name('audit-findings.update');
        Route::delete('/audit-findings/{auditFinding}', 'destroy')->name('audit-findings.destroy');
        Route::get('/audit-finding-input', 'view');
        Route::get('/audit-finding-list', 'index');
    });

    Route::controller(ControlAuditFindingController::class)->group(function () {
        Route::get('/controls-audit-findings', 'index')->name('control-vs-audit');
        Route::get('/audit-findings-controls', 'auditVsControls')->name('audit-vs-control');
    });


    // Auditor



    Route::controller(AuditorFormController::class)->group(function () {
        Route::get('/auditor-list', 'index')->name('auditors.index');
        Route::get('/auditor-table/{auditor_id}', 'show')->name('auditors.show');
        Route::post('/auditor-input/post', 'store')->name('auditors.store');
        Route::get('/auditor/{auditor:auditor_id}/edit', 'edit')->name('auditors.edit');
        Route::patch('/auditor/{auditor}', 'update')->name('auditors.updated');
        Route::delete('/auditor/delete', 'delete')->name('auditors.delete');
        Route::get('/auditor-input', function () {
            return view('4-Process/9-Audit/2-AuditorForm');
        })->name('auditors.create');
    });

    // Route::get('/auditor-input', function () {
    //     return view('4-Process/9-Audit/2-AuditorForm')->name('auditors.create');;
    // });



    // Auditee


    Route::controller(AuditeeController::class)->group(function () {
        Route::get('/auditee-list', 'index')->name('auditees.index');
        Route::get('/auditee-table/{auditee:auditee_id}', 'show')->name('auditees.show');
        Route::post('/auditee-input/post', 'store')->name('auditees.store');
        Route::get('/auditee-input', 'view')->name('auditees.create');
        Route::get('/auditee/{auditee:auditee_id}/edit', 'edit')->name('auditees.edit');
        Route::patch('/auditee/{auditee}', 'update')->name('auditees.update');
        Route::delete('/auditee/delete', 'delete')->name('auditees.delete');
    });


    // Artifacts

    Route::controller(ArtifactController::class)->group(function () {
        Route::get('/artifacts', 'index')->name('artifacts.index');
        Route::get('/artifacts/create', 'create')->name('artifacts.create');
        Route::get('/artifacts/{artifact}', 'show')->name('artifacts.show');
        Route::post('/artifacts', 'store')->name('artifacts.store');
        Route::get('/artifacts/{artifact}/edit', 'edit')->name('artifacts.edit');
        Route::put('/artifacts/{artifact}', 'update')->name('artifacts.update');
        Route::delete('/artifacts/{artifact?}', 'destroy')->name('artifacts.delete');
    });

    // Attachments
    Route::controller(TempFileUploadController::class)->group(function () {
        Route::post('/uploads', 'store')->name('temp.upload.store');
        Route::delete('/tmp/delete', 'destroy')->name('temp.upload.destroy');
    });

    Route::controller(ArtifactAttachmentController::class)->group(function () {
        Route::delete('/attachments/{attachment}', 'destroy')->name('artifacts.attachments.destroy');
    });

    // Evidence

    Route::controller(EvidenceController::class)->group(function () {
        Route::get('/evidences', 'index')->name('evidences.index');
        Route::get('/evidences/create', 'create')->name('evidences.create');
        Route::get('/evidences/{evidence:evidence_id}', 'show')->name('evidences.show');
        Route::post('/evidences', 'store')->name('evidences.store');
        Route::get('/evidences/edit/{evidence:evidence_id}', 'edit')->name('evidences.edit');
        Route::put('/evidences/{evidence:evidence_id}', 'update')->name('evidences.update');
        Route::delete('/evidences', 'destroy')->name('evidences.delete');

        Route::get('/evidence-list/view/{evidence:evidence_id}', 'viewevilist')->name('evidence.view');
        Route::patch('/evidence-list/update_attachment', 'update_attachment')->name('evidence.update.attachment');
        Route::post('/evidence-list/delete-attachment', 'delete_attachment')->name('evidence.delete.attachment');
    });

    Route::controller(ControlEvidenceController::class)->group(function () {
        Route::get('/control-evidence', 'controlVsEvidence')->name('control.evidence.index');
        Route::get('/evidence-control', 'evicontshow')->name('evidence.control.index');
    });






    // Route::get('/attachment-list', function () {
    //     return view('4-Process/11-Attachment/1-AttachmentList');
    // });

    Route::get('/attachment-table/att-001', function () {
        return view('4-Process/11-Attachment/1-AttachmentTable');
    });


    // Risk Assessment


    // Control Assessment

    // ------------Control Assessment Master--------------

    Route::controller(ControlAssessmentController::class)->group(function () {
        Route::get('/control-assessments', 'index')->name('control-assessments.index');
        Route::get('/control-assessments/create', 'create')->name('control-assessments.create');
        Route::post('/control-assessments', 'store')->name('control-assessments.store');
        Route::get('/control-assessments/{controlAssessment}', 'show')->name('control-assessments.show');
        Route::get('/control-assessments/edit/{controlAssessment}', 'edit')->name('control-assessments.edit');
        Route::put('/control-assessments/{controlAssessment}', 'update')->name('control-assessments.update');
        Route::delete('/control-assessments', 'destroy')->name('control-assessments.destroy');
    });


    // ------------Control Assessment Finding--------------

    Route::controller(ControlAssessmentFindingController::class)->group(function () {
        Route::get('/control-assessment-findings', 'index')->name('control-assessment-findings.index');
        Route::get('/control-assessment-findings/{controlAssessmentFinding}', 'show')->name('control-assessment-findings.show');
        Route::get('/control-assessment-findings/create/{controlAssessment}', 'create')->name('control-assessment-findings.create');
        Route::post('/control-assessment-findings/{controlAssessment}', 'store')->name('control-assessment-findings.store');
        Route::get('/control-assessment-findings/edit/{controlAssessmentFinding}', 'edit')->name('control-assessment-findings.edit');
        Route::put('/control-assessment-findings/{controlAssessmentFinding}', 'update')->name('control-assessment-findings.update');
        Route::delete('/control-assessment-findings/{controlAssessmentFinding}', 'destroy')->name('control-assessment-findings.destroy');

        Route::post('/evidence-conroller/', 'get_evidence_by_conroller');
        Route::post('/bestpractice-controlls/', 'get_controls_by_bestpractice');
    });


    // Risk Assessment


    // ------------Risk Assessment Master--------------


    Route::controller(RiskAssessmentController::class)->group(function () {
        Route::get('/risk-assessments', 'index')->name('risk-assessments.index');
        Route::get('/risk-assessment-input', 'create')->name('risk.riskAss');
        Route::get('/risk-assessment-table/{riskAssessment:risk_assessment_id}', 'show')->name('risk-assessments.show');
        Route::post('/risk-assessment-input/post', 'store');
        Route::get('/risk-assessments/edit/{riskAssessment:risk_assessment_id}', 'edit')->name('risk-assessments.edit');
        Route::put('/risk-assessments/{riskAssessment}', 'update')->name('risk-assessments.update');
        Route::delete('/risk-assessment', 'destroy')->name('risk-assessments.destroy');
        Route::post('/risk-control/', 'get_control_by_risk');
    });

    // ------------Risk Assessment Finding--------------


    Route::controller(RiskAssessmentFindingController::class)->group(function () {
        Route::get('/risk-assessment-findings/create/{riskAssessment:risk_assessment_id}', 'create')->name('risk-assessment-findings.create');
        Route::get('/risk-assessment-finding-table/{riskAssessmentDetail:risk_finding_id}', 'show')->name('risk-assessment-findings.show');
        Route::post('/risk-assessment-finding-input/{riskAssessment:risk_assessment_id}', 'store')->name('risk-assessment-findings.store');
        Route::get('/risk-assessment-findings/edit/{riskAssessmentDetail:risk_finding_id}', 'edit')->name('risk-assessment-findings.edit');
        Route::put('/risk-assessment-findings/{riskAssessmentDetail}', 'update')->name('risk-assessment-findings.update');
        Route::delete('/risk-assessment-findings/{riskAssessmentDetail:risk_finding_id}', 'destroy')->name('risk-assessment-findings.destroy');

        Route::get('/risk-assessment-finding-input', 'view')->name('risk.riskAssfind');
        Route::get('/risk-assessment-finding-list', 'index');
        Route::delete('/risk-assessment-finding/delete', 'delete')->name('delete.riskAssfind');
    });

    Route::controller(KPICategoryController::class)->group(function () {
        Route::get('/kpi-references', 'report')->name('kpi-references.index');
        Route::get('/kpi-categories', 'index')->name('kpi-categories.index');
        Route::get('/kpi-categories/create', 'create')->name('kpi-categories.create');
        Route::get('/kpi-categories/{category:kpi_id}', 'show')->name('kpi-categories.show');
        Route::post('/kpi-categories', 'store')->name('kpi-categories.store');
        Route::get('/kpi-categories/edit/{category:kpi_id}', 'edit')->name('kpi-categories.edit');
        Route::put('/kpi-categories/{category}', 'update')->name('kpi-categories.update');
        Route::delete('/kpi-categories/', 'destroy')->name('kpi-categories.delete');
    });

    Route::controller(KPIStandardController::class)->group(function () {
        Route::get('/kpi-standards', 'index')->name('kpi-standards.index');
        Route::get('/kpi-standards/create', 'create')->name('kpi-standards.create');
        Route::get('/kpi-standards/{kpi:kpi_id}', 'show')->name('kpi-standards.show');
        Route::post('/kpi-standards', 'store')->name('kpi-standards.store');
        Route::get('/kpi-standards/edit/{kpi:kpi_id}', 'edit')->name('kpi-standards.edit');
        Route::put('/kpi-standards/{kpi:id}', 'update')->name('kpi-standards.update');
        Route::delete('/kpi-standards/', 'destroy')->name('kpi-standards.delete');
    });


    Route::controller(KPIStandardReportController::class)->group(function () {
        Route::get('/kpi-standards-report', 'index')->name('kpi-standards-report.index');
        Route::get('/kpi-standards-report/{category:category_id}', 'show')->name('kpi-standards-report.show');
        Route::get('/kpi-standards-report/create', 'create')->name('kpi-standards-report.create');
        Route::post('/kpi-standards-report', 'store')->name('kpi-standards-report.store');
        Route::get('/kpi-standards-report/edit/{standard:standard_id}', 'edit')->name('kpi-standards-report.edit');
        Route::put('/kpi-standards-report/{standard}', 'update')->name('kpi-standards-report.update');
        Route::delete('/kpi-standards-report/', 'destroy')->name('kpi-standards-report.delete');
    });


    Route::get('/domain-vs-control-dashboard', [DashboardController::class, 'domainControllersReport'])->name('domain-vs-control-dashboard');
    Route::get('/control-vs-risk-dashboard', [DashboardController::class, 'controlRisksReport'])->name('control-vs-risk-dashboard');
    Route::get('/risk-vs-asset-dashboard', [DashboardController::class, 'riskAssetsReport'])->name('risk-vs-asset-dashboard');

    // BY PASS
    // Route::get('/dashboard', function () {
    //     return view('4-Process/18-Reporting/3-Dashboard/0-MainDashboard');
    // });

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
        return view('4-Process/18-Reporting/3-Dashboard/5-OCDCSGOV');
    });

    Route::get('/cs-defense-dashboard', function () {
        return view('4-Process/18-Reporting/3-Dashboard/6-OCDCSDEF');
    });

    Route::get('/cs-resilience-dashboard', function () {
        return view('4-Process/18-Reporting/3-Dashboard/7-OCDCSRES');
    });

    Route::get('/cs-third-party-dashboard', function () {
        return view('4-Process/18-Reporting/3-Dashboard/8-OCDCSTPT');
    });

    Route::get('/cs-ics-dashboard', function () {
        return view('4-Process/18-Reporting/3-Dashboard/9-OCDCSICS');
    });


    // End of Show Dashboard


    Route::controller(MainDashboardController::class)->group(function () {
        Route::get('/dashboard-one', 'getRecordCount');
        Route::post('/dashboard-one', 'getRecordCount')->name('dashboardCount');
    });


    Route::get('/dashboard-two', function () {
        return view('4-Process/18-Reporting/3-Dashboard/0-DashboardTwo');
    });

    // Regulatory Reports New

    Route::get('/regulatory-reports', function () {

        return view('4-Process/18-Reporting/1-RegulatoryReportsNew/1-RegulatoryReport');
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

        Route::get('/ecc-regulatory-report-excel', 'downloadExcelReport')->name('ecc-regulatory-report.excel');
        Route::get('/ecc-2024-regulatory-report-excel', 'downloadEcc2024ExcelReport')->name('ecc-2024-regulatory-report.excel');
        Route::get('/cscc-regulatory-report-excel', 'downloadCsccExcelReport')->name('cscc-regulatory-report.excel');
        Route::get('/ccc-regulatory-report-excel', 'downloadCccExcelReport')->name('ccc-regulatory-report.excel');
        Route::get('/tcc-regulatory-report-excel', 'downloadTccExcelReport')->name('tcc-regulatory-report.excel');
        Route::get('/osmacc-regulatory-report-excel', 'downloadOsmaccExcelReport')->name('osmacc-regulatory-report.excel');
        Route::get('/dcc-regulatory-report-excel', 'downloadDccExcelReport')->name('dcc-regulatory-report.excel');
    });


    Route::get('/risk-status-register', function () {
        return view('4-Process/20-RiskRegister/1-RiskRegisterReport');
    });

    Route::get('/frameworks', function () {
        return view('4-Process/framework');
    });

    Route::get('/personal-data-frameworks', function () {
        return view('4-Process/PdplFramework');
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
        return view('4-Process/18-Reporting/2-MISReporting/0-MisReporting');
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



    Route::controller(RiskTreatmentTableController::class)->group(function () {
        Route::get('/risk-treatment', 'index')->name('risk-treatment.index');
        Route::get('/control-risk', 'controlVsRisk')->name('control-risk.index');
    });

    Route::controller(RiskAssetGroupTableController::class)->group(function () {
        Route::get('/risk-asset-group', 'index')->name('riskvsassetgroup');
        Route::get('/asset-risk-group', 'assetVsRisk')->name('assetgroupvsrisk');
    });

    Route::controller(RiskRegisterController::class)->group(function () {
        Route::get('/risk-register', 'riskregister');
    });
});


Route::get('/asset-smart-search', [AssetSmartSearch::class, 'show'])->name('asset.smart.search');


Route::get('/hr-experts', [HumanResourceController::class, 'show'])->name('hr.expert');




// Protected routes




Route::get('/data-governance', function () {
    return view('4-Process/17-GrcDomain/data-governance');
});
Route::get('/data-catalog', function () {
    return view('4-Process/17-GrcDomain/data-catalog');
});
Route::get('/data-quality', function () {
    return view('4-Process/17-GrcDomain/data-quality');
});
Route::get('/data-operations', function () {
    return view('4-Process/17-GrcDomain/data-operations');
});
Route::get('/document-content-management', function () {
    return view('4-Process/17-GrcDomain/document-content-management');
});
Route::get('/data-architecture-modeling', function () {
    return view('4-Process/17-GrcDomain/data-architecture-modeling');
});
Route::get('/reference-master-data-management', function () {
    return view('4-Process/17-GrcDomain/reference-master-data-management');
});
Route::get('/business-intelligence-analytics', function () {
    return view('4-Process/17-GrcDomain/business-intelligence-analytics');
});
Route::get('/data-sharing-interoperability', function () {
    return view('4-Process/17-GrcDomain/data-sharing-interoperability');
});
Route::get('/data-value-realization', function () {
    return view('4-Process/17-GrcDomain/data-value-realization');
});
Route::get('/open-data', function () {
    return view('4-Process/17-GrcDomain/open-data');
});
Route::get('/freedom-information', function () {
    return view('4-Process/17-GrcDomain/freedom-information');
});
Route::get('/data-classification', function () {
    return view('4-Process/17-GrcDomain/data-classification');
});
Route::get('/personal-data-protection', function () {
    return view('4-Process/17-GrcDomain/personal-data-protection');
});
Route::get('/data-security-protection', function () {
    return view('4-Process/17-GrcDomain/data-security-protection');
});



Route::view('/cs-induction', '4-Process/1-CsInduction');

Route::prefix('cs-induction')->group(function () {
    Route::view('/cybersecurity-governance', '4-Process/17-GrcDomain/1-CybersecurityStrategyCsIndu');
    Route::view('/cybersecurity-strategy', '4-Process/17-GrcDomain/2-CybersecurityManagementCsIndu');
    Route::view('/cybersecurity-policies', '4-Process/17-GrcDomain/3-CybersecurityPoliciesAndProcedureCsIndu');
    Route::view('/cybersecurity-roles-and-responsibilities', '4-Process/17-GrcDomain/4-CybersecurityRiskManagementCsIndu');
    Route::view('/cybersecurity-project-management', '4-Process/17-GrcDomain/5-CybersecurityItProjectManagementCsIndu');
    Route::view('/cybersecurity-awareness', '4-Process/17-GrcDomain/6-ComplianceCybersecurityStandardCsIndu');
    Route::view('/cybersecurity-review', '4-Process/17-GrcDomain/7-CybersecurityAssetManagementCsIndu');
    Route::view('/cybersecurity-audit', '4-Process/17-GrcDomain/8-IdentityAccessManagementCsIndu');
    Route::view('/human-resources', '4-Process/17-GrcDomain/9-InformationSystemProcessingCsIndu');
    Route::view('/physical-security', '4-Process/17-GrcDomain/10-EmailProtectionCsIndu');
    
    Route::view('/asset-management', '4-Process/17-GrcDomain/11-NetworkSecurityManagementCsIndu');
    Route::view('/cybersecurity-architecture', '4-Process/17-GrcDomain/12-MobileDeviceSecurityCsIndu');
    Route::view('/identity-and-access-management', '4-Process/17-GrcDomain/13-DataInformationSecurityCsIndu');
    Route::view('/change-management', '4-Process/17-GrcDomain/15-BackupRecoveryManagementCsIndu');
    Route::view('/infrastructure-security', '4-Process/17-GrcDomain/16-VulnerabilitManagementCsIndu');
    Route::view('/cryptography', '4-Process/17-GrcDomain/17-PenetrationTestingCsIndu');
    Route::view('/bring-your-own-device', '4-Process/17-GrcDomain/18-CybersecurityEventLogsCsIndu');
    Route::view('/secure-disposal', '4-Process/17-GrcDomain/19-CybersecurityIncidentManagementCsIndu');
    Route::view('/payment-system', '4-Process/17-GrcDomain/20-PhysicalSecurityCsIndu');
    Route::view('/electronic-banking', '4-Process/17-GrcDomain/21-WebApplicationSecurityCsIndu');
    
    Route::view('/cybersecurity-event-management', '4-Process/17-GrcDomain/22-CybersecurityResilienceCsIndu');
    Route::view('/cybersecurity-incident-management', '4-Process/17-GrcDomain/23-ThirdPartyCybersecurityCsIndu');
    Route::view('/threat-management', '4-Process/17-GrcDomain/24-CloudComputingCsIndu');
    Route::view('/vulnerability-management', '4-Process/17-GrcDomain/25-IndustrialControlsCsIndu');
    Route::view('/contract-and-vendor', '4-Process/17-GrcDomain/26-ChangeManagementCsIndu');
    Route::view('/outsourcing', '4-Process/17-GrcDomain/27-SecureDataDisposalCsIndu');
    Route::view('/cloud-computing', '4-Process/17-GrcDomain/31-CloudComputingCsIndu');
    Route::view('/cybersecurity-training', '4-Process/17-GrcDomain/28-PeriodicalCybersecurityReviewCsIndu');
    Route::view('/cybersecurity-risk-management', '4-Process/17-GrcDomain/29-CybersecurityHRCsIndu');
    Route::view('/cybersecurity-regulatory-compliance', '4-Process/17-GrcDomain/30-CybersecurityAwarenessTrainingCsIndu');
});

// Process


Route::get('/process/list', [CMSController::class, 'processIndex'])->name('process.index');
Route::get('/process/create', [CMSController::class, 'processCreate'])->name('process.create');
Route::get('/process/cms/{process:process_id}', [CMSController::class, 'processShow'])->name('process.show');
Route::post('/process', [CMSController::class, 'processStore'])->name('process.store');
Route::get('/process/edit/{process}', [CMSController::class, 'processEdit'])->name('process.edit');
Route::PUT('/process/{process}', [CMSController::class, 'processUpdate'])->name('process.update');
Route::delete('/process', [CMSController::class, 'processDelete'])->name('process.destroy');



Route::get('/create-resource/{process}', [ResourceController::class, 'create'])->name('resource.create');
Route::post('/upload-resource', [ResourceController::class, 'upload'])->name('upload.resource');

Route::get('/process', [ProcessController::class, 'index']);
Route::get('/process/{process:process_id}', [ProcessController::class, 'show'])->name('process.view.show');
Route::get('/resource/{process:process_id}/videos/', [ProcessResourceController::class, 'videos'])->name('process.resource.videos');
Route::get('/video/stream/{resource}', [ProcessResourceController::class, 'stream'])->name('secure.video.stream');

Route::get('/resource/{process:process_id}/checklist/', [ProcessResourceController::class, 'checklist'])->name('process.resource.checklist');
Route::get('/resource/{process:process_id}/template/', [ProcessResourceController::class, 'template'])->name('process.resource.template');
Route::get('/resource/template/{resource}', [ProcessResourceController::class, 'pdfTemplate'])->name('process.resource.template.pdf');
Route::get('/resource/{process:process_id}/glossary/', [ProcessResourceController::class, 'glossary'])->name('process.resource.glossary');
Route::delete('/resources/{resource}', [ProcessResourceController::class, 'destroy'])->name('process.resource.destroy');

// Route::prefix('process')->group(function () {
//     Route::get('{process:process_id}', [ResourceController::class, 'create'])->name('resource.create');

//     Route::view('/cybersecurity-governance', '4-Process/17-GrcDomain/1-CybersecurityStrategy');
//     Route::view('/cybersecurity-strategy', '4-Process/17-GrcDomain/2-CybersecurityManagement');
//     Route::view('/cybersecurity-policies', '4-Process/17-GrcDomain/3-CybersecurityPoliciesAndProcedure');
//     Route::view('/cybersecurity-roles-and-responsibilities', '4-Process/17-GrcDomain/4-CybersecurityRiskManagement');
//     Route::view('/cybersecurity-project-management', '4-Process/17-GrcDomain/5-CybersecurityItProjectManagement');
//     Route::view('/cybersecurity-awareness', '4-Process/17-GrcDomain/6-ComplianceCybersecurityStandard');
//     Route::view('/cybersecurity-training', '4-Process/17-GrcDomain/28-PeriodicalCybersecurityReview');
//     Route::view('/cybersecurity-risk-management', '4-Process/17-GrcDomain/29-CybersecurityHR');
//     Route::view('/cybersecurity-regulatory-compliance', '4-Process/17-GrcDomain/30-CybersecurityAwarenessTraining');
//     Route::view('/cybersecurity-review', '4-Process/17-GrcDomain/7-CybersecurityAssetManagement');
//     Route::view('/cybersecurity-audit', '4-Process/17-GrcDomain/8-IdentityAccessManagement');
//     Route::view('/human-resources', '4-Process/17-GrcDomain/9-InformationSystemProcessing');
//     Route::view('/physical-security', '4-Process/17-GrcDomain/10-EmailProtection');
//     Route::view('/asset-management', '4-Process/17-GrcDomain/11-NetworkSecurityManagement');
//     Route::view('/cybersecurity-architecture', '4-Process/17-GrcDomain/12-MobileDeviceSecurity');
//     Route::view('/identity-and-access-management', '4-Process/17-GrcDomain/13-DataInformationSecurity');
//     Route::view('/application-security', '4-Process/17-GrcDomain/14-Cryptography');
//     Route::view('/change-management', '4-Process/17-GrcDomain/change-management');
//     Route::view('/infrastructure-security', '4-Process/17-GrcDomain/16-VulnerabilitManagement');
//     Route::view('/cryptography', '4-Process/17-GrcDomain/17-PenetrationTesting');
//     Route::view('/bring-your-own-device', '4-Process/17-GrcDomain/18-CybersecurityEventLogs');
//     Route::view('/secure-disposal', '4-Process/17-GrcDomain/19-CybersecurityIncidentManagement');
//     Route::view('/payment-system', '4-Process/17-GrcDomain/20-PhysicalSecurity');
//     Route::view('/electronic-banking', '4-Process/17-GrcDomain/21-WebApplicationSecurity');
//     Route::view('/cybersecurity-event-management', '4-Process/17-GrcDomain/22-CybersecurityResilience');
//     Route::view('/cybersecurity-incident-management', '4-Process/17-GrcDomain/23-ThirdPartyCybersecurity');
//     Route::view('/threat-management', '4-Process/17-GrcDomain/24-CloudComputing');
//     Route::view('/vulnerability-management', '4-Process/17-GrcDomain/25-IndustrialControls');
//     Route::view('/contract-and-vendor', '4-Process/17-GrcDomain/26-ChangeManagement');
//     Route::view('/outsourcing', '4-Process/17-GrcDomain/27-SecureDataDisposal');
//     Route::view('/cloud-computing', '4-Process/17-GrcDomain/31-CloudComputing');
// });


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
    return view('4-Process/15-ProductSupplier/1-ProductMasterForm');
});


Route::prefix('products')->group(function () {
    Route::view('/anti-phishing-software', '4-Process/15-ProductSupplier/products/anti-phishing-software');
    Route::view('/anti-ransomware-software', '4-Process/15-ProductSupplier/products/anti-ransomware-software');
    Route::view('/application-whitelisting', '4-Process/15-ProductSupplier/products/application-whitelisting');
    Route::view('/backup-recovery', '4-Process/15-ProductSupplier/products/backup-recovery');
    Route::view('/brand-protection', '4-Process/15-ProductSupplier/products/brand-protection');
    Route::view('/casb', '4-Process/15-ProductSupplier/products/casb');
    Route::view('/container-kubernetes-security', '4-Process/15-ProductSupplier/products/container-kubernetes-security');
    Route::view('/data-classification', '4-Process/15-ProductSupplier/products/data-classification');
    Route::view('/data-loss-prevention', '4-Process/15-ProductSupplier/products/data-loss-prevention');
    Route::view('/database-activity-monitoring', '4-Process/15-ProductSupplier/products/database-activity-monitoring');
    Route::view('/distributed-denial-of-service-of-attack', '4-Process/15-ProductSupplier/products/distributed-denial-of-service-of-attack');
    Route::view('/email-security', '4-Process/15-ProductSupplier/products/email-security');
    Route::view('/encryption', '4-Process/15-ProductSupplier/products/encryption');
    Route::view('/end-point-detection-response', '4-Process/15-ProductSupplier/products/end-point-detection-response');
    Route::view('/extended-detection-protection-response', '4-Process/15-ProductSupplier/products/extended-detection-protection-response');
    Route::view('/identity-access-management', '4-Process/15-ProductSupplier/products/identity-access-management');
    Route::view('/iot-security', '4-Process/15-ProductSupplier/products/iot-security');
    Route::view('/multi-factor-authentication', '4-Process/15-ProductSupplier/products/multi-factor-authentication');
    Route::view('/network-access-control', '4-Process/15-ProductSupplier/products/network-access-control');
    Route::view('/next-generation-firewall', '4-Process/15-ProductSupplier/products/next-generation-firewall');
    Route::view('/penetration-testing', '4-Process/15-ProductSupplier/products/penetration-testing');
    Route::view('/privilege-access-management', '4-Process/15-ProductSupplier/products/privilege-access-management');
    Route::view('/siem-solution', '4-Process/15-ProductSupplier/products/siem-solution');
    Route::view('/threat-intelligence', '4-Process/15-ProductSupplier/products/threat-intelligence');
    Route::view('/unified-threat-management', '4-Process/15-ProductSupplier/products/unified-threat-management');
    Route::view('/user-entity-behavior-analytics', '4-Process/15-ProductSupplier/products/user-entity-behavior-analytics');
    Route::view('/web-application-firewall', '4-Process/15-ProductSupplier/products/web-application-firewall');
    Route::view('/wifi-security', '4-Process/15-ProductSupplier/products/wifi-security');
    Route::view('/zero-day-attack', '4-Process/15-ProductSupplier/products/zero-day-attack');
    Route::view('/zero-trust', '4-Process/15-ProductSupplier/products/zero-trust');
});

// ISO-27001
Route::view('/scope-of-isms', '4-Process/iso-27001/scope-of-isms');
Route::view('/isms', '4-Process/iso-27001/isms');
Route::view('/asset-inventory', '4-Process/iso-27001/asset-inventory');
Route::view('/risk-assessment-methodology', '4-Process/iso-27001/risk-assessment-methodology');
Route::view('/risk-assessment', '4-Process/iso-27001/risk-assessment');
Route::view('/risk-treatment-iso-27001', '4-Process/iso-27001/risk-treatment');
Route::view('/risk-register-iso-27001', '4-Process/iso-27001/risk-register');
Route::view('/statement-of-applicability', '4-Process/iso-27001/statement-of-applicability');
Route::view('/project-management-security-framework', '4-Process/iso-27001/project-management-security-framework');
Route::view('/network-security-framework', '4-Process/iso-27001/network-security-framework');
Route::view('/secure-coding-framework', '4-Process/iso-27001/secure-coding-framework');
Route::view('/hr-framework', '4-Process/iso-27001/hr-framework');
Route::view('/third-party-security-framework', '4-Process/iso-27001/third-party-security-framework');
Route::view('/internal-audit-27001', '4-Process/iso-27001/internal-audit');
Route::view('/management-review-27001', '4-Process/iso-27001/management-review');



Route::get('/generate-ppt', [PresentationController::class, 'generateChart'])->name('generate.ppt');
Route::get('/pen-test-generate-ppt/{va_pt_test_id}', [PresentationController::class, 'generatePenTestChart'])->name('pen-test.generate.ppt');

Route::controller(TPTExpertsControl::class)->group(function () {

    Route::get('/tpt-experts', 'index')->name('tpt-experts.index');
    Route::get('/tpt-experts/{expert:tpt_experties_id}', 'show')->name('tpt-experts.show');
    Route::get('/tpt-experts-input', 'create')->name('tpt-experts.create');
    Route::get('/tpt-experts/edit/{expert:tpt_experties_id}', 'edit')->name('tpt-experts.edit');
    Route::post('/tpt-experts', 'store')->name('tpt-experts.store');
    Route::put('/tpt-experts/{expert}', 'update')->name('tpt-experts.update');
    Route::delete('/tpt-experts/delete', 'destroy')->name('tpt-experts.delete');
});

Route::controller(ThirdPartyController::class)->group(function () {
    Route::get('/third-party', 'index')->name('third-party.index');
    Route::get('/third-party/create', 'create')->name('third-party.create');
    Route::get('/third-party/{thirdParty:tpt_id}', 'show')->name('third-party.show');
    Route::get('/third-party/edit/{thirdParty:tpt_id}', 'edit')->name('third-party.edit');
    Route::post('/third-party', 'store')->name('third-party.store');
    Route::put('/third-party/{thirdParty}', 'update')->name('third-party.update');
    Route::delete('/third-party/delete', 'destroy')->name('third-party.delete');
});

Route::controller(PatchController::class)->group(function () {
    Route::get('/patch', 'index')->name('patch.index');
    Route::get('/patch/create', 'create')->name('patch.create');
    Route::get('/patch/{patch:patch_id}', 'show')->name('patch.show');
    Route::get('/patch/edit/{patch:patch_id}', 'edit')->name('patch.edit');
    Route::post('/patch', 'store')->name('patch.store');
    Route::put('/patch/{patch}', 'update')->name('patch.update');
    Route::delete('/patch/delete', 'destroy')->name('patch.delete');
});

Route::controller(PenTestController::class)->group(function () {
    Route::get('/va-pen-test', 'index')->name('pen-test.index');
    Route::get('/va-pen-test/create', 'create')->name('pen-test.create');
    Route::get('/va-pen-test/{penTest:va_pt_test_id}', 'show')->name('pen-test.show');
    Route::get('/va-pen-test/edit/{penTest:va_pt_test_id}', 'edit')->name('pen-test.edit');
    Route::post('/va-pen-test', 'store')->name('pen-test.store');
    Route::put('/va-pen-test/{penTest}', 'update')->name('pen-test.update');
    Route::delete('/va-pen-test/delete', 'destroy')->name('pen-test.delete');
});


Route::controller(PenTestFindingsController::class)->group(function () {
    Route::get('/va-pen-test-findings', 'index')->name('pen-test-findings.index');
    Route::get('/va-pen-test-findings/create/{penTest:va_pt_test_id}', 'create')->name('pen-test-findings.create');
    Route::get('/va-pen-test-findings/{penTestFinding:va_pt_finding_id}', 'show')->name('pen-test-findings.show');
    Route::get('/va-pen-test-findings/edit/{penTestFinding:va_pt_finding_id}', 'edit')->name('pen-test-findings.edit');
    Route::post('/va-pen-test-findings/{penTest}', 'store')->name('pen-test-findings.store');
    Route::put('/va-pen-test-findings/{penTestFinding}', 'update')->name('pen-test-findings.update');
    Route::delete('/va-pen-test-findings/delete', 'destroy')->name('pen-test-findings.delete');
    Route::post('/upload-poc', 'uploadPoc')->name('pen-test-findings.upload');
    Route::delete('/delete-temp-poc', 'deleteTempPoc')->name('pen-test-findings.poc.temp.destroy');
    Route::delete('/delete-poc/{attachment}', 'deletePoc')->name('pen-test-findings.poc.destroy');
});

Route::controller(PenTestDashboardController::class)->group(function () {
    Route::get('/va-pen-test-list', 'list')->name('pen-test-dashboard.index');
    Route::get('/va-pen-test-dashboard/{penTest:va_pt_test_id}', 'index')->name('pen-test-dashboard');
    Route::get('/va-pen-test-level/{penTest:va_pt_test_id}/{level}', 'level')->name('pen-test-level');
    Route::get('/va-pen-test-level-status/{penTest:va_pt_test_id}', 'levelStatus')->name('pen-test-level-status');
    Route::get('/va-pen-test-status/{penTest:va_pt_test_id}/{status}', 'status')->name('pen-test-status');
    Route::get('/va-pen-test-level-records/{penTest:va_pt_test_id}', 'levelRecords')->name('pen-test-level-records');
});

Route::controller(PenTestReportController::class)->group(function () {
    Route::get('/va-pen-test-report/{penTest:va_pt_test_id}', 'report')->name('pen-test-report');
    Route::get('/va-asset-vs-risk', 'assetVsRisk')->name('pen-test-asset-vs-risk');
});

// Asset Data Uploader
Route::get('/upload-assets', [DataUploaderController::class, 'create'])->name('upload.assets.create');
Route::post('/upload-assets', [DataUploaderController::class, 'uploadAssets'])->name('upload.assets.store');


// Owner Data Uploader
Route::get('/upload-owners', [DataUploaderController::class, 'createOwner'])->name('upload.owner.create');
Route::post('/upload-owners', [DataUploaderController::class, 'uploadOwners'])->name('upload.owners.store');

// Custodian Data Uploader
Route::get('/upload-custodians', [DataUploaderController::class, 'createCustodian'])->name('upload.custodian.create');
Route::post('/upload-custodians', [DataUploaderController::class, 'uploadCustodian'])->name('upload.custodian.store');

// Artifact Data Uploader
Route::get('/upload-artifacts', [DataUploaderController::class, 'createArtifact'])->name('upload.artifact.create');
Route::post('/upload-artifacts', [DataUploaderController::class, 'uploadArtifact'])->name('upload.artifact.store');

Route::resource('objectives', ObjectivesController::class)->except(['destroy']);
Route::delete('/objectives/delete', [ObjectivesController::class, 'destroy'])->name('objectives.destroy');
