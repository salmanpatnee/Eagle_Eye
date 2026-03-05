@extends('layouts.user')
@section('title', 'CISO Essential Frameworks')
@section('content')
    <div>
        <x-table.action-wrapper title="CISO Essential Frameworks List">
            <x-action.button label="Add Framework" route_name="ciso-essential-frameworks.create" />
        </x-table.action-wrapper>

        <x-table.table-sticky>
            <x-table.thead-sticky>
                <x-table.th label="S.No" />
                <x-table.th label="Framework Title" />
                <x-table.th label="Action" />
            </x-table.thead-sticky>

            <x-table.tbody>
                @foreach ($frameworks as $framework)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$frameworks" /></x-table.td>
                        <x-table.td>{{ $framework->title }}</x-table.td>
                        <x-table.td action_col="true">
                            <a href="{{ route('ciso-essential-frameworks.resource.create', $framework->id) }}"
                                class="inline-flex items-center justify-center p-1.5 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-blue-600 transition-colors">
                                <x-icons.media />
                            </a>
                            <x-action.view route_name="ciso-essential-frameworks.show" param="{{ $framework->id }}" />
                            <x-action.edit route_name="ciso-essential-frameworks.edit" param="{{ $framework->id }}" />
                            <x-action.delete route_name="ciso-essential-frameworks.destroy" param="{{ $framework->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table-sticky>

        <x-pagination>
            {{ $frameworks->links() }}
        </x-pagination>
    </div>
@endsection
