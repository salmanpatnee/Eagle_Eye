<div class="TableHeading">
    <div class="PageHead">
        <p class="PageHeadArbTxt">إعداد الجهة</p>
        <p class="PageHeadEngTxt">Organization Setup</p>
    </div>
    <div class="ButtonContainer">
        <a href="{{route('organizations.index')}}" class="MoreButton">
            <p class="ButtonArbTxt">منظر</p>
            <p class="ButtonEngTxt">View</p>
        </a>
        @can('manage-initial-setup')
            <a href="{{ route('organizations.create') }}" class="MoreButton">
                <p class="ButtonArbTxt">يضيف</p>
                <p class="ButtonEngTxt">Add</p>
            </a>
        @endcan
        
        <a href="" class="{{ request()->routeIs('organizations.index') ? 'DisabledButton' : 'MoreButton' }}">
            <p class="ButtonArbTxt">تحديث</p>
            <p class="ButtonEngTxt">Update</p>
        </a>
        @can('manage-initial-setup')
            <button type="submit" class="DeleteButton">
                <p class="ButtonArbTxt">يمسح</p>
                <p class="ButtonEngTxt">Delete</p>
            </button>
        @endcan
    </div>
</div>
