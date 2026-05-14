<x-table.scroll-table>
    <x-slot:head>
        <x-table.th label="S.No" label_ar="رقم" />
        <x-table.th label="Finding ID" label_ar="رمز العثور على" />
        <x-table.th label="Finding Name" label_ar="اسم العثور على" />
        <x-table.th label="Status" label_ar="الحالة" />
        <x-table.th label="Action" label_ar="إجراء" />
    </x-slot:head>
    <x-slot:body>
        @forelse ($paginatedFindings as $finding)
            <tr class="hover:bg-gray-50 dark:hover:bg-white/[0.03]">
                <x-table.td>{{ ($paginatedFindings->currentPage() - 1) * $paginatedFindings->perPage() + $loop->index + 1 }}</x-table.td>
                <x-table.td>{{ $finding->audit_finding_id }}</x-table.td>
                <x-table.td>{{ $finding->audit_finding_name }}</x-table.td>
                <x-table.td>{{ $finding->audit_finding_status }}</x-table.td>
                <x-table.td action_col="true">
                    <x-action.view route_name="audit-findings.show" param="{{ $finding->id }}" />
                    <x-action.edit route_name="audit-findings.edit" param="{{ $finding->id }}" />
                    <x-action.delete route_name="audit-findings.destroy" param="{{ $finding->id }}" />
                </x-table.td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">No findings found.</td>
            </tr>
        @endforelse
    </x-slot:body>
</x-table.scroll-table>
<x-pagination>
    {{ $paginatedFindings->links() }}
</x-pagination>
