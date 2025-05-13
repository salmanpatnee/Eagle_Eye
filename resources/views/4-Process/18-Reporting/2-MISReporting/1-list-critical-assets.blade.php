@extends('4-Process/18-Reporting/2-MISReporting/master-layout')
@section('content')
    <div class="herosec">
        <div class="herosecleft">
            <div class="cveButton">
                <h1>تقرير الأصول الحرجة</h1>
                <h3>Critical Assets Report</h3>
                
            </div>
        </div>
    </div>
    <div class="tablearea">
        <table class="table">
            <thead class="tablehead">
                <tr>
                    <th>
                        <p>رقم</p>
                        <p>S.No</p>
                    </th>
                    <th>
                        <p>رمز الأصول</p>
                        <p>Asset ID</p>
                    </th>
                    <th>
                        <p>اسم الأصول</p>
                        <p>Asset Name</p>
                    </th>

                    <th>
                        <p>اسم مجموعة الأصول</p>
                        <p>Asset Group Name</p>
                    </th>
                    <th>
                        <p>اسم نوع الأصل</p>
                        <p>Asset Type Name</p>
                    </th>
                    <th>
                        <p>اسم الموقع</p>
                        <p>Location Name</p>
                    </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                @foreach ($criticalAssets as $criticalAsset)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            <a href="{{ route('assetreg.show', $criticalAsset->asset_id) }}">
                                {{ $criticalAsset->asset_id }}
                            </a>
                        </td>
                        <td>{{ $criticalAsset->asset_name }}</td>
                        <td>{{ $criticalAsset->assetGroup->asset_group_name }}</td>
                        <td>{{ $criticalAsset->assetType->asset_type_name }}</td>
                        <td>{{ $criticalAsset->location->location_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
