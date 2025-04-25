<?php

namespace App\Http\Controllers;

use App\Models\ControlMaster;
use App\Models\Domain;
use App\Models\SubDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NcaEccAssessmentController extends Controller
{
    // 2.Controller - SHOW DATA INTO THE LIST

    public function index()
    {
        // $data = DB::table('control_master_table')
        // ->join('audit_findings_table', 'control_master_table.category_name', '=', 'audit_findings_table.control_name')
        // ->where('best_practices_name', 'NCA-ECC')
        // ->get();

        $data = DB::table('control_master_table as master')
            ->leftJoin('control_assessment_details_table as details',  'master.control_id', '=', 'details.control_id')
            ->where('details.id', '!=', null) //->where('control_master_table_vs_best_practice_table.best_practices_id', 'NCA-ECC')
            ->get();

        // echo "<pre>";
        // print_r($data->toArray());
        // echo "</pre>";


        return view('4-Process/18-Reporting/1-RegulatoryReporting/1-NcaEccAssessmentReport', ['data' => $data]);
    }
    
        // BPT-001
    public function report($bestpracticetype = 'NCA-CCC-2020')
    {
     
        $reports = [];

        $domains = DB::table('domain_table as maindomain')->get();
         
        foreach ($domains as $domain) {
            $reports[$domain->id] = $domain;
            
            
            $sub_domains = DB::table('sub_domain_table as sub_domain')->where('sub_domain.main_domain_id', $domain->main_domain_id)->get();
            
            
            
            foreach ($sub_domains as $sub_domain) {
                $reports[$domain->id]->{'sub_domains'}[$sub_domain->id] = $sub_domain;
                
                
                
                $control_sub_domains = DB::table('control_master_table_vs_sub_domain_table as controlsubdomain')
                    ->where('controlsubdomain.sub_domain_id', '=', $sub_domain->sub_domain_id)
                    ->get();
                
                
                
                foreach ($control_sub_domains as $control_sub_domain) {
                    $control = DB::table('control_master_table as controlmaster')
                        ->join('control_master_table_vs_best_practice_table as controlbestpractice', 'controlbestpractice.control_id', '=', 'controlmaster.control_id')
                        ->join('owner_table as ownertable', 'ownertable.owner_role_id', '=', 'controlmaster.owner_id')
                        ->where('controlbestpractice.best_practices_id', "NCA-CCC-2020")->first();
                        // ->where('controlmaster.control_id', $control_sub_domain->control_id)->first();
                        
                    // dd($control_sub_domain);
                    
                    if( !is_null($control) ) {
                        $reports[$domain->id]->{'sub_domains'}[$sub_domain->id]->{'controls'}[$control->id] = $control;
                        $control_assessments = DB::table('control_assessment_details_table as controlassessment')
                            ->join('control_assessment_detail_vs_control_master_table as controlassessmentmaster', 'controlassessmentmaster.control_assessment_finding_id', '=', 'controlassessment.control_finding_id')
                            ->where('controlassessmentmaster.control_id', $control->control_id)
                            ->get();
                        foreach ($control_assessments as $control_assessment) {
                            $reports[$domain->id]->{'sub_domains'}[$sub_domain->id]->{'controls'}[$control->id]->{'assessments'}[$control_assessment->id] = $control_assessment;
                        }
                    }
                }
            }
        }
        // dd($reports);

        return view('4-Process/18-Reporting/1-RegulatoryReporting/1-NcaEccAssessmentReportShow', [
            'reports' => $reports
        ]);
    }
}