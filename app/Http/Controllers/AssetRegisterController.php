<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Custodian;
use App\Models\CustodianName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetRegisterController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::select('category_id', 'category_name')->get();
        $assetOptions = Asset::select('asset_id', 'asset_name')->get();

        $asset = $request->input('asset') ?? null;
        $category = $request->input('category') ?? null;

        $assets = Asset::with('categories')
            ->when($asset, function ($query, $asset) {
                $query->where('asset_id', $asset);
            })->when($category, function ($query, $category) {
                $query->whereHas('categories', function ($query) use ($category) {
                    $query->where('category_table.category_id', $category);
                });
            })->paginate(20);



        return view('4-Process/3-Asset/asset-register/index', compact('assets', 'categories', 'assetOptions', 'asset', 'category'));
    }

    public function show(Asset $asset)
    {
        $asset->load('categories', 'custodians', 'assetGroup', 'owner', 'assetType', 'assetSubType', 'owner', 'assetStatus', 'classification');

        return view('4-Process/3-Asset/asset-register/show', compact('asset'));
    }

    // To add data into the table
    public function create()
    {
        $assetregister = null;
        $categories = DB::table('category_table')->distinct()->get();
        $custodians = DB::table('custodian_name_table')->distinct()->get();
        $assetgroup = DB::table('asset_group_table')->get();
        $assetOwners = DB::table('owner_table')->get();
        $assetTypes = DB::table('asset_type_table')->get();
        $assetSubType = DB::table('asset_sub_type_table')->get();
        $locations = DB::table('location_table')->get();
        $assetStatus = DB::table('asset_status_table')->get();
        $assetclass = DB::table('classification_table')->get();
        return view('4-Process/3-Asset/1-AssetRegisterForm', compact('assetregister', 'categories', 'custodians', 'assetgroup', 'assetOwners', 'assetTypes', 'assetSubType', 'locations', 'assetStatus', 'assetclass'));
    }

    // To edit the table
    public function edit($id)
    {
        $assetregister = Asset::where('asset_id', $id)->first();


        $categories = DB::table('category_table')->distinct()->get();
        $custodians = DB::table('custodian_name_table')->distinct()->get();
        // $assetregister = DB::table('asset_register_table')->where('asset_id', $id)->first();
        $assetgroup = DB::table('asset_group_table')->get();
        $assetOwners = DB::table('owner_table')->get();
        $assetTypes = DB::table('asset_type_table')->get();
        $assetSubType = DB::table('asset_sub_type_table')->get();
        $locations = DB::table('location_table')->get();
        $assetStatus = DB::table('asset_status_table')->get();
        $assetclass = DB::table('classification_table')->get();

        $assetregister->load('custodians', 'categories');

        $custodianIds = $assetregister->custodians->pluck('custodian_name_id')->toArray();
        $categoryIds = $assetregister->categories->pluck('category_id')->toArray();



        return view('4-Process/3-Asset/1-AssetRegisterForm', compact('custodianIds', 'categoryIds', 'assetregister',  'categories', 'custodians', 'assetgroup', 'assetOwners', 'assetTypes', 'assetSubType', 'locations', 'assetStatus', 'assetclass'));
    }

    // To store the edited data into the table
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'asset_id' => ['required', 'unique:asset_register_table'],
            'asset_name' => 'required',
            'asset_description' => 'nullable',
            'asset_ip_address' => 'nullable',
            'asset_host_name' => 'nullable',
            'asset_url' => 'nullable',
            'categories' => 'nullable',
            // 'custodians' => 'nullable',
            'cs_confidentiality' => 'nullable',
            'cs_integrity' => 'nullable',
            'cs_availability' => 'nullable',
            'risk_rating' => 'nullable',
            'regulatory_rating' => 'nullable',
            'critical_asset' => 'nullable',
            'cloud_asset' => 'nullable',
            'telework_asset' => 'nullable',
            'social_media_asset' => 'nullable',
            'data_privacy_asset' => 'nullable',
            'data_pii_asset' => 'nullable',
            'pci_dss_asset' => 'nullable',
            'e_commerce_asset' => 'nullable',
            'infrastructure_assets' => 'nullable',
            'application_assets' => 'nullable',
            'hr_asset' => 'nullable',
            'physical_assets' => 'nullable',
            'third_party_asset' => 'nullable',
            'operational_asset' => 'nullable',
            'e_banking_asset' => 'nullable',
            'payment_asset' => 'nullable',
            'cscc_standard_1_applicable' => 'nullable',
            'cscc_standard_1_value' => 'nullable',
            'cscc_standard_2_applicable' => 'nullable',
            'cscc_standard_2_value' => 'nullable',
            'cscc_standard_3_applicable' => 'nullable',
            'cscc_standard_3_value' => 'nullable',
            'cscc_standard_4_applicable' => 'nullable',
            'cscc_standard_4_value' => 'nullable',
            'cscc_standard_5_applicable' => 'nullable',
            'cscc_standard_5_value' => 'nullable',
            'cscc_standard_6_applicable' => 'nullable',
            'cscc_standard_6_value' => 'nullable',
            'cscc_standard_7_applicable' => 'nullable',
            'cscc_standard_7_value' => 'nullable',
            'osmacc_standard_1_applicable' => 'nullable',
            'osmacc_standard_1_value' => 'nullable',
            'osmacc_standard_2_applicable' => 'nullable',
            'osmacc_standard_2_value' => 'nullable',
            'osmacc_standard_3_applicable' => 'nullable',
            'osmacc_standard_3_value' => 'nullable',
            'asset_group_id' => 'required',
            // 'owner_id' => 'required',
            'asset_type_id' => 'required',
            'asset_sub_type_id' => 'required',
            'location_id' => 'required',
            'asset_status_id' => 'required',
            'classification_id' => 'nullable',
        ]);

        $categories = $attributes['categories'];
        // $custodians = $attributes['custodians'];

        unset($attributes['categories']);
        // unset($attributes['custodians']);

        $asset = Asset::create($attributes);

        // if ($custodians && $custodiansArray = json_decode($custodians, true)) {
        //     $asset->custodians()
        //         ->attach($custodiansArray);
        // }

        if ($categories && $categoriesArray = json_decode($categories, true)) {
            $asset->categories()
                ->attach($categoriesArray);
        }

        return redirect()->route('assets.index')->with('success', 'Asset saved successfully.');
    }

    public function update(Asset $asset, Request $request)
    {

        $attributes = $request->validate([
            'asset_id' => ['required', 'unique:asset_register_table,asset_id,' . $asset->id],
            'asset_name' => 'required',
            'asset_description' => 'nullable',
            'asset_ip_address' => 'nullable',
            'asset_host_name' => 'nullable',
            'asset_url' => 'nullable',
            'categories' => 'nullable',
            // 'custodians' => 'nullable',
            'cs_confidentiality' => 'nullable',
            'cs_integrity' => 'nullable',
            'cs_availability' => 'nullable',
            'risk_rating' => 'nullable',
            'regulatory_rating' => 'nullable',
            'critical_asset' => 'nullable',
            'cloud_asset' => 'nullable',
            'telework_asset' => 'nullable',
            'social_media_asset' => 'nullable',
            'data_privacy_asset' => 'nullable',
            'data_pii_asset' => 'nullable',
            'pci_dss_asset' => 'nullable',
            'e_commerce_asset' => 'nullable',
            'infrastructure_assets' => 'nullable',
            'application_assets' => 'nullable',
            'hr_asset' => 'nullable',
            'physical_assets' => 'nullable',
            'third_party_asset' => 'nullable',
            'operational_asset' => 'nullable',
            'e_banking_asset' => 'nullable',
            'payment_asset' => 'nullable',
            'cscc_standard_1_applicable' => 'nullable',
            'cscc_standard_1_value' => 'nullable',
            'cscc_standard_2_applicable' => 'nullable',
            'cscc_standard_2_value' => 'nullable',
            'cscc_standard_3_applicable' => 'nullable',
            'cscc_standard_3_value' => 'nullable',
            'cscc_standard_4_applicable' => 'nullable',
            'cscc_standard_4_value' => 'nullable',
            'cscc_standard_5_applicable' => 'nullable',
            'cscc_standard_5_value' => 'nullable',
            'cscc_standard_6_applicable' => 'nullable',
            'cscc_standard_6_value' => 'nullable',
            'cscc_standard_7_applicable' => 'nullable',
            'cscc_standard_7_value' => 'nullable',
            'osmacc_standard_1_applicable' => 'nullable',
            'osmacc_standard_1_value' => 'nullable',
            'osmacc_standard_2_applicable' => 'nullable',
            'osmacc_standard_2_value' => 'nullable',
            'osmacc_standard_3_applicable' => 'nullable',
            'osmacc_standard_3_value' => 'nullable',
            'asset_group_id' => 'required',
            // 'owner_id' => 'required',
            'asset_type_id' => 'required',
            'asset_sub_type_id' => 'required',
            'location_id' => 'required',
            'asset_status_id' => 'required',
            'classification_id' => 'nullable',
        ]);

        $categories = $attributes['categories'];
        // $custodians = $attributes['custodians'];

        unset($attributes['categories']);
        unset($attributes['custodians']);

        $asset->update($attributes);

        // if ($custodians && $custodiansArray = json_decode($custodians, true)) {
        //     $asset->custodians()
        //         ->sync($custodiansArray);
        // }

        if ($categories && $categoriesArray = json_decode($categories, true)) {
            $asset->categories()
                ->sync($categoriesArray);
        }

        return redirect()->route('assets.index')->with('success', 'Asset saved successfully.');
    }
    //----------------------------------------------------------------------------------------------//




    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        Asset::where('asset_id', $attributes['record'])->delete();

        return redirect('/assets');

        // $selectedassetregister = $request->input('selectedassetregister');

        // if (count($selectedassetregister)) {
        //     foreach ($selectedassetregister as $id) {
        //         $asset = Asset::find($id);
        //         $asset->categories()->detach();
        //         $asset->custodians()->detach();
        //         $asset->delete();
        //     }
        // }

        // // if (!empty($selectedassetregister)) {
        // //     DB::table('asset_register_table')->whereIn('asset_id', $selectedassetregister)->delete();
        // // }
        // return redirect('/assets');
    }
}
