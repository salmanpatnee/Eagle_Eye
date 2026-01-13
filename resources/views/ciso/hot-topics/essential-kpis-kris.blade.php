@extends('layouts.ciso-full')
@section('title', 'Essential KPIs and KRIs')
@section('title_ar', '')
@section('content')



    <div class="px-7">
        <h3 class="bg-black font-bold my-6 p-3 rounded-md text-white">Essential Key Performance Indicators</h3>
        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" />
                <x-table.th label="KPI Name" />
                <x-table.th label="Target Numeric Value" />
                <x-table.th label="Time Bound" />
            </x-table.thead>
            <x-table.tbody>
                <tr>
                    <x-table.td>1</x-table.td>
                    <x-table.td>Mean Time to Detect (MTTD)</x-table.td>
                    <x-table.td>≤ 24 hours</x-table.td>
                    <x-table.td>Per security incident</x-table.td>
                </tr>
                <tr>
                    <x-table.td>2</x-table.td>
                    <x-table.td>Mean Time to Respond (MTTR)</x-table.td>
                    <x-table.td>≤ 48 hours</x-table.td>
                    <x-table.td>Per security incident</x-table.td>
                </tr>
                <tr>
                    <x-table.td>3</x-table.td>
                    <x-table.td>Number of Security Incidents</x-table.td>
                    <x-table.td>≤ 5 incidents</x-table.td>
                    <x-table.td>Monthly</x-table.td>
                </tr>
                <tr>
                    <x-table.td>4</x-table.td>
                    <x-table.td>Patch Management Compliance</x-table.td>
                    <x-table.td>≥ 95%</x-table.td>
                    <x-table.td>Monthly</x-table.td>
                </tr>
                <tr>
                    <x-table.td>5</x-table.td>
                    <x-table.td>Phishing Email Click Rate</x-table.td>
                    <x-table.td>≤ 5%</x-table.td>
                    <x-table.td>Quarterly</x-table.td>
                </tr>
                <tr>
                    <x-table.td>6</x-table.td>
                    <x-table.td>Multi-Factor Authentication (MFA) Adoption Rate</x-table.td>
                    <x-table.td>≥ 98%</x-table.td>
                    <x-table.td>Monthly</x-table.td>
                </tr>
                <tr>
                    <x-table.td>7</x-table.td>
                    <x-table.td>Number of Privileged Access Violations</x-table.td>
                    <x-table.td>≤ 2 incidents</x-table.td>
                    <x-table.td>Monthly</x-table.td>
                </tr>
                <tr>
                    <x-table.td>8</x-table.td>
                    <x-table.td>Data Loss Prevention (DLP) Policy Violations</x-table.td>
                    <x-table.td>≤ 10 violations</x-table.td>
                    <x-table.td>Monthly</x-table.td>
                </tr>
                <tr>
                    <x-table.td>9</x-table.td>
                    <x-table.td>Compliance Audit Pass Rate</x-table.td>
                    <x-table.td>≥ 90%</x-table.td>
                    <x-table.td>Annually</x-table.td>
                </tr>
                <tr>
                    <x-table.td>10</x-table.td>
                    <x-table.td>Security Awareness Training Completion Rate</x-table.td>
                    <x-table.td>≥ 95%</x-table.td>
                    <x-table.td>Annually</x-table.td>
                </tr>
            </x-table.tbody>
        </x-table.table>
        <h3 class="bg-black font-bold mb-3 p-3 rounded-md text-white mt-3">Essential Key Risk Indicators</h3>
        <x-table.table>
            <x-table.thead>
                <tr>
                    <x-table.th label="S.No" />
                    <x-table.th label="KRI Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Target Numeric Value" />
                    <x-table.th label="Time Bound" />
                </tr>
            </x-table.thead>
            <x-table.tbody>
                <tr>
                    <x-table.td>1</x-table.td>
                    <x-table.td>Unpatched Critical Vulnerabilities</x-table.td>
                    <x-table.td>Number of high-severity vulnerabilities that remain unpatched beyond the SLA.</x-table.td>
                    <x-table.td>≤ 2 vulnerabilities</x-table.td>
                    <x-table.td>Monthly</x-table.td>
                </tr>
                <tr>
                    <x-table.td>2</x-table.td>
                    <x-table.td>Number of Phishing Attacks Reported</x-table.td>
                    <x-table.td>Tracks the frequency of phishing attempts targeting employees.</x-table.td>
                    <x-table.td>≤ 10 incidents</x-table.td>
                    <x-table.td>Monthly</x-table.td>
                </tr>
                <tr>
                    <x-table.td>3</x-table.td>
                    <x-table.td>Mean Time to Detect (MTTD) Security Incidents</x-table.td>
                    <x-table.td>Average time taken to detect a security incident.</x-table.td>
                    <x-table.td>≤ 24 hours</x-table.td>
                    <x-table.td>Per incident</x-table.td>
                </tr>
                <tr>
                    <x-table.td>4</x-table.td>
                    <x-table.td>Mean Time to Respond (MTTR) to Incidents</x-table.td>
                    <x-table.td>Average time taken to contain and remediate a security breach.</x-table.td>
                    <x-table.td>≤ 48 hours</x-table.td>
                    <x-table.td>Per incident</x-table.td>
                </tr>
                <tr>
                    <x-table.td>5</x-table.td>
                    <x-table.td>Unauthorized Access Attempts</x-table.td>
                    <x-table.td>Number of failed or suspicious login attempts to critical systems.</x-table.td>
                    <x-table.td>≤ 3 per system</x-table.td>
                    <x-table.td>Weekly</x-table.td>
                </tr>
                <tr>
                    <x-table.td>6</x-table.td>
                    <x-table.td>Percentage of Unencrypted Sensitive Data</x-table.td>
                    <x-table.td>Amount of sensitive data stored or transmitted without encryption.</x-table.td>
                    <x-table.td>≤ 1%</x-table.td>
                    <x-table.td>Monthly</x-table.td>
                </tr>
                <tr>
                    <x-table.td>7</x-table.td>
                    <x-table.td>Insider Threat Indicators</x-table.td>
                    <x-table.td>Number of detected abnormal user behaviors indicating insider threats.</x-table.td>
                    <x-table.td>≤ 2 incidents</x-table.td>
                    <x-table.td>Monthly</x-table.td>
                </tr>
                <tr>
                    <x-table.td>8</x-table.td>
                    <x-table.td>Non-Compliance with Security Policies</x-table.td>
                    <x-table.td>Percentage of employees or systems failing to comply with security policies.</x-table.td>
                    <x-table.td>≤ 5%</x-table.td>
                    <x-table.td>Quarterly</x-table.td>
                </tr>
                <tr>
                    <x-table.td>9</x-table.td>
                    <x-table.td>Third-Party Security Risks</x-table.td>
                    <x-table.td>Number of security vulnerabilities or non-compliance issues found in vendor risk
                        assessments.</x-table.td>
                    <x-table.td>≤ 2 per vendor</x-table.td>
                    <x-table.td>Annually</x-table.td>
                </tr>
                <tr>
                    <x-table.td>10</x-table.td>
                    <x-table.td>Unusual Network Traffic Spikes</x-table.td>
                    <x-table.td>Frequency of unexpected network traffic surges, indicating a potential
                        cyberattack.</x-table.td>
                    <x-table.td>≤ 1 major anomaly</x-table.td>
                    <x-table.td>Monthly</x-table.td>
                </tr>
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
