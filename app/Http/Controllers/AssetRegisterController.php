<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetRegisterController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::select('category_id', 'category_name')->get();
        $assetOptions = Asset::select('asset_id', 'asset_name')->get();

        $asset = $request->input('asset') ?? [];
        $category = $request->input('category') ?? [];

        $assets = Asset::with('categories')
            ->when($asset, function ($query, $asset) {
                if (is_array($asset)) {
                    $query->whereIn('asset_id', $asset);
                }
            })->when($category, function ($query, $category) {
                $query->whereHas('categories', function ($query) use ($category) {
                    $query->whereIn('category_table.category_id', $category);
                });
            })->paginate(20)->withQueryString();



        return view('process/assets/asset-register/index', compact('assets', 'categories', 'assetOptions', 'asset', 'category'));
    }

    public function show(Asset $asset)
    {
        $asset->load('categories', 'assetGroup', 'owner', 'assetType', 'assetSubType', 'owner', 'assetStatus', 'classification');

        return view('process/assets/asset-register/show', compact('asset'));
    }

    // To add data into the table
    public function create()
    {
        $asset = null;
        $categories = DB::table('category_table')->distinct()->get();
        $assetGroups = DB::table('asset_group_table')->get();
        $assetOwners = DB::table('owner_table')->get();
        $assetTypes = DB::table('asset_type_table')->get();
        $assetSubTypes = DB::table('asset_sub_type_table')->get();
        $locations = DB::table('location_table')->get();
        $assetStatus = DB::table('asset_status_table')->get();
        $classifications = DB::table('classification_table')->get();
        $categoryIds = [];
        return view('process/assets/asset-register/create', compact('asset', 'categories', 'assetGroups', 'assetOwners', 'assetTypes', 'assetSubTypes', 'locations', 'assetStatus', 'classifications', 'categoryIds'));
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

        $categories = $attributes['categories'] ?? null;
        unset($attributes['categories']);



        $asset = Asset::create($attributes);

        $asset->categories()->attach($categories ?? []);

        return redirect()->route('assets.index')->with('success', 'Asset saved successfully.');
    }

    // To edit the table
    public function edit(Asset $asset)
    {

        $categories = DB::table('category_table')->distinct()->get();
        $assetGroups = DB::table('asset_group_table')->get();
        $assetOwners = DB::table('owner_table')->get();
        $assetTypes = DB::table('asset_type_table')->get();
        $assetSubTypes = DB::table('asset_sub_type_table')->get();
        $locations = DB::table('location_table')->get();
        $assetStatus = DB::table('asset_status_table')->get();
        $classifications = DB::table('classification_table')->get();

        $asset->load('categories');

        $categoryIds = $asset->categories->pluck('category_id')->toArray();

        return view('process/assets/asset-register/create', compact('categoryIds', 'asset',  'categories', 'assetGroups', 'assetOwners', 'assetTypes', 'assetSubTypes', 'locations', 'assetStatus', 'classifications'));
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

        $categories = $attributes['categories'] ?? null;
        unset($attributes['categories']);

        $asset->update($attributes);

        $asset->categories()->sync($categories ?? []);

        return redirect()->route('assets.index')->with('success', 'Asset saved successfully.');
    }
    //----------------------------------------------------------------------------------------------//



    public function destroy(Asset $asset)
    {
        // Detach relationships if they exist before deleting the asset
        if ($asset->categories()->exists()) {
            $asset->categories()->detach();
        }
        if ($asset->custodians()->exists()) {
            $asset->custodians()->detach();
        }

        $asset->delete();

        return redirect()->route('assets.index')
            ->with('success', "Asset {$asset->asset_name} deleted successfully.");
    }
}
