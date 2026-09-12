<?php

namespace App\Enums;

enum ControlMaturityLevel: int
{
    case NonExistent = 0;
    case AdHoc = 1;
    case RepeatableButInformal = 2;
    case StructuredAndFormalized = 3;
    case ManagedAndMeasurable = 4;
    case Adaptive = 5;

    public function label(): string
    {
        return match ($this) {
            self::NonExistent => 'Non-existent',
            self::AdHoc => 'Ad-hoc',
            self::RepeatableButInformal => 'Repeatable but informal',
            self::StructuredAndFormalized => 'Structured and formalized',
            self::ManagedAndMeasurable => 'Managed and measurable',
            self::Adaptive => 'Adaptive',
        };
    }

    public function display(): string
    {
        return "{$this->value} - {$this->label()}";
    }

    /**
     * @return array<int, string>
     */
    public function criteria(): array
    {
        return match ($this) {
            self::NonExistent => [
                'No documentation.',
                'There is no awareness or attention for certain information technology control.',
            ],
            self::AdHoc => [
                'Control is not or partially defined.',
                'Controls are performed in an inconsistent way.',
                'Controls are not fully defined.',
            ],
            self::RepeatableButInformal => [
                'The execution of the control is based on an informal and unwritten, though standardized, practice.',
            ],
            self::StructuredAndFormalized => [
                'Controls are defined, approved and implemented in a structured and formalized way.',
                'The implementation of controls can be demonstrated.',
            ],
            self::ManagedAndMeasurable => [
                'The effectiveness of the controls are periodically assessed and improved when necessary.',
                'This periodic measurement, evaluations and opportunities for improvement are documented.',
            ],
            self::Adaptive => [
                'Controls are subject to a continuous improvement plan.',
            ],
        };
    }

    /**
     * @return array<int, string>
     */
    public function explanation(): array
    {
        return match ($this) {
            self::NonExistent => [
                'Controls are not in place. There may be no awareness of the particular risk area or no current plans to implement such controls.',
            ],
            self::AdHoc => [
                'Control design and execution varies by department or owner.',
                'Control design may only partially mitigate the identified risk and execution may be inconsistent.',
            ],
            self::RepeatableButInformal => [
                'Repeatable controls are in place. However, the control objectives and design are not formally defined or approved.',
                'There is limited consideration for a structured review or testing of a control.',
            ],
            self::StructuredAndFormalized => [
                'Policies, standards and procedures are established.',
                'Compliance with documentation i.e., policies, standards and procedures is monitored, preferably using a governance, risk and compliance tool (GRC).',
                'Key performance indicators are defined, monitored and reported to evaluate the implementation.',
            ],
            self::ManagedAndMeasurable => [
                'Effectiveness of controls are measured and periodically evaluated.',
                'Key risk indicators and trend reporting are used to determine the effectiveness of the controls.',
                'Results of measurement and evaluation are used to identify opportunities for improvement of the controls.',
            ],
            self::Adaptive => [
                'The enterprise-wide governance program focuses on continuous compliance, effectiveness and improvement of the controls.',
                'Controls are integrated with enterprise risk management framework and practices.',
                'Performance of controls are evaluated using peer and sector data.',
            ],
        };
    }

    /**
     * @return array<int, string>
     */
    public static function options(): array
    {
        return array_map(fn (self $case) => $case->display(), self::cases());
    }
}
