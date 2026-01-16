<?php

namespace App\Http\Controllers;

use App\Models\BestPractice;
use App\Models\Category;
use App\Models\Classification;
use App\Models\ControlMaster;
use App\Models\ControlType;
use App\Models\Domain;
use App\Models\SubDomain;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ControlSmartSearch extends Controller
{
    /**
     * Available control relation filters.
     *
     * @var array<int, array{relation_id: string, relation_name: string}>
     */
    private const RELATIONS = [
        ['relation_id' => 'control_critical_asset', 'relation_name' => 'Control Critical Asset'],
        ['relation_id' => 'control_cloud', 'relation_name' => 'Control Cloud'],
        ['relation_id' => 'control_telework', 'relation_name' => 'Control Telework'],
        ['relation_id' => 'control_social_media', 'relation_name' => 'Control Social Media'],
        ['relation_id' => 'control_data_privicy', 'relation_name' => 'Control Data Privicy'],
        ['relation_id' => 'control_pii', 'relation_name' => 'Control pii'],
        ['relation_id' => 'control_pci_dss', 'relation_name' => 'Control Pci Dss'],
        ['relation_id' => 'control_e_commerce', 'relation_name' => 'Control E-Commerce'],
        ['relation_id' => 'control_infrastructure', 'relation_name' => 'Control Infrastructure'],
        ['relation_id' => 'control_application', 'relation_name' => 'Control Application'],
        ['relation_id' => 'control_hr', 'relation_name' => 'Control HR'],
        ['relation_id' => 'control_physical_security', 'relation_name' => 'Control Physical Security'],
        ['relation_id' => 'control_operational', 'relation_name' => 'Control Third Party'],
        ['relation_id' => 'control_payment', 'relation_name' => 'Control Payment'],
        ['relation_id' => 'control_e_banking', 'relation_name' => 'Control E-banking'],
    ];

    public function __invoke(Request $request): View
    {
        $filters = $this->extractFilters($request);

        $controlIds = $this->getOrderedControlIds();
        $dropdownData = $this->getDropdownData();

        $controls = $this->buildControlsQuery($filters)->paginate(20);
        $controls->appends($this->buildPaginationAppends($filters));

        return view('process/control-identification/control-smart-search/index', [
            'controls' => $controls,
            'controlIds' => $controlIds,
            'classifications' => $dropdownData['classifications'],
            'categories' => $dropdownData['categories'],
            'types' => $dropdownData['types'],
            'practices' => $dropdownData['practices'],
            'domains' => $dropdownData['domains'],
            'subDomains' => $dropdownData['subDomains'],
            'relations' => $this->getRelationsAsObjects(),
            ...$filters,
        ]);
    }

    /**
     * Extract filter values from the request.
     *
     * @return array{controlId: ?string, classification: ?string, category: ?string, type: ?string, practice: ?string, domain: ?string, subdomain: ?string, relation: ?string}
     */
    private function extractFilters(Request $request): array
    {
        return [
            'controlId' => $request->input('control_name'),
            'classification' => $request->input('classification'),
            'category' => $request->input('category'),
            'type' => $request->input('type'),
            'practice' => $request->input('practice'),
            'domain' => $request->input('domain'),
            'subdomain' => $request->input('subdomain'),
            'relation' => $request->input('relation'),
        ];
    }

    /**
     * Get control IDs ordered by their composite segments.
     *
     * @return \Illuminate\Support\Collection<int, string>
     */
    private function getOrderedControlIds(): \Illuminate\Support\Collection
    {
        return ControlMaster::query()
            ->join('control_master_table_vs_best_practice_table as cvb', 'control_master_table.control_id', '=', 'cvb.control_id')
            ->join('best_practice_table as b', 'cvb.best_practice_id', '=', 'b.best_practice_id')
            ->orderControls()
            ->pluck('control_master_table.control_id');
    }

    /**
     * Get all dropdown data for filter selects.
     *
     * @return array{classifications: \Illuminate\Support\Collection, categories: \Illuminate\Support\Collection, types: \Illuminate\Support\Collection, practices: \Illuminate\Support\Collection, domains: \Illuminate\Support\Collection, subDomains: \Illuminate\Support\Collection}
     */
    private function getDropdownData(): array
    {
        return [
            'classifications' => Classification::query()->select('id', 'classification_id', 'classification_name')->get(),
            'categories' => Category::query()->select('id', 'category_id', 'category_name')->get(),
            'types' => ControlType::query()->select('id', 'control_type_id', 'control_type_name')->get(),
            'practices' => BestPractice::query()->select('id', 'best_practice_id', 'best_practice_name')->get(),
            'domains' => Domain::query()->select('id', 'main_domain_id', 'main_domain_name')->get(),
            'subDomains' => SubDomain::query()->select('id', 'sub_domain_id', 'sub_domain_name')->get(),
        ];
    }

    /**
     * Build the controls query with all joins and filters.
     *
     * @param  array{controlId: ?string, classification: ?string, category: ?string, type: ?string, practice: ?string, domain: ?string, subdomain: ?string, relation: ?string}  $filters
     */
    private function buildControlsQuery(array $filters): \Illuminate\Database\Query\Builder
    {
        return ControlMaster::query()
            ->from('control_master_table as controlmaster')
            ->join('control_master_table_vs_category_table as controlcategory', 'controlcategory.control_id', '=', 'controlmaster.control_id')
            ->join('category_table as category', 'category.category_id', '=', 'controlcategory.category_id')
            ->join('control_master_table_vs_best_practice_table as controlbestpractice', 'controlbestpractice.control_id', '=', 'controlmaster.control_id')
            ->join('best_practice_table as bestpractice', 'bestpractice.best_practice_id', '=', 'controlbestpractice.best_practice_id')
            ->join('control_master_table_vs_domain_table as controldomain', 'controldomain.control_id', '=', 'controlmaster.control_id')
            ->join('domain_table as domain', 'domain.main_domain_id', '=', 'controldomain.main_domain_id')
            ->join('control_master_table_vs_sub_domain_table as controlsubdomain', 'controlsubdomain.control_id', '=', 'controlmaster.control_id')
            ->join('sub_domain_table as subdomain', 'subdomain.sub_domain_id', '=', 'controlsubdomain.sub_domain_id')
            ->join('control_type_table as controltype', 'controltype.control_type_id', '=', 'controlmaster.control_type_id')
            ->join('classification_table as classification', 'classification.classification_id', '=', 'controlmaster.classification_id')
            ->when($filters['controlId'], fn ($query) => $query->where('controlmaster.control_id', $filters['controlId']))
            ->when($filters['classification'], fn ($query) => $query->where('classification.classification_id', $filters['classification']))
            ->when($filters['category'], fn ($query) => $query->where('category.category_id', $filters['category']))
            ->when($filters['type'], fn ($query) => $query->where('controltype.control_type_id', $filters['type']))
            ->when($filters['practice'], fn ($query) => $query->where('bestpractice.best_practice_id', $filters['practice']))
            ->when($filters['domain'], fn ($query) => $query->where('domain.main_domain_id', $filters['domain']))
            ->when($filters['subdomain'], fn ($query) => $query->where('subdomain.sub_domain_id', $filters['subdomain']))
            ->when($filters['relation'], fn ($query) => $query->where($filters['relation'], 'Yes'))
            ->toBase();
    }

    /**
     * Build pagination append parameters from filters.
     *
     * @param  array{controlId: ?string, classification: ?string, category: ?string, type: ?string, practice: ?string, domain: ?string, subdomain: ?string, relation: ?string}  $filters
     * @return array<string, ?string>
     */
    private function buildPaginationAppends(array $filters): array
    {
        return [
            'control_id' => $filters['controlId'],
            'classification' => $filters['classification'],
            'category' => $filters['category'],
            'type' => $filters['type'],
            'practice' => $filters['practice'],
            'domain' => $filters['domain'],
            'subdomain' => $filters['subdomain'],
            'relation' => $filters['relation'],
        ];
    }

    /**
     * Convert relations constant to objects for view compatibility.
     *
     * @return array<int, object>
     */
    private function getRelationsAsObjects(): array
    {
        return array_map(fn (array $relation) => (object) $relation, self::RELATIONS);
    }
}
