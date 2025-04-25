@extends('6-HotTopics/topic-layout')
@section('heading')
    Essential KPIs and KRIs
@endsection
@section('background')
@endsection
@section('content')
    <h3>Essential Key Performance Indicators</h3>
    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>KPI Name</th>
                <th>Target Numeric Value</th>
                <th>Time Bound</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Mean Time to Detect (MTTD)</td>
                <td>≤ 24 hours</td>
                <td>Per security incident</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Mean Time to Respond (MTTR)</td>
                <td>≤ 48 hours</td>
                <td>Per security incident</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Number of Security Incidents</td>
                <td>≤ 5 incidents</td>
                <td>Monthly</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Patch Management Compliance</td>
                <td>≥ 95%</td>
                <td>Monthly</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Phishing Email Click Rate</td>
                <td>≤ 5%</td>
                <td>Quarterly</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Multi-Factor Authentication (MFA) Adoption Rate</td>
                <td>≥ 98%</td>
                <td>Monthly</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Number of Privileged Access Violations</td>
                <td>≤ 2 incidents</td>
                <td>Monthly</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Data Loss Prevention (DLP) Policy Violations</td>
                <td>≤ 10 violations</td>
                <td>Monthly</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Compliance Audit Pass Rate</td>
                <td>≥ 90%</td>
                <td>Annually</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Security Awareness Training Completion Rate</td>
                <td>≥ 95%</td>
                <td>Annually</td>
            </tr>
        </tbody>
    </table>
    <h3>Essential Key Risk Indicators</h3>
    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>KRI Name</th>
                <th>Description</th>
                <th>Target Numeric Value</th>
                <th>Time Bound</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Unpatched Critical Vulnerabilities</td>
                <td>Number of high-severity vulnerabilities that remain unpatched beyond the SLA.</td>
                <td>≤ 2 vulnerabilities</td>
                <td>Monthly</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Number of Phishing Attacks Reported</td>
                <td>Tracks the frequency of phishing attempts targeting employees.</td>
                <td>≤ 10 incidents</td>
                <td>Monthly</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Mean Time to Detect (MTTD) Security Incidents</td>
                <td>Average time taken to detect a security incident.</td>
                <td>≤ 24 hours</td>
                <td>Per incident</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Mean Time to Respond (MTTR) to Incidents</td>
                <td>Average time taken to contain and remediate a security breach.</td>
                <td>≤ 48 hours</td>
                <td>Per incident</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Unauthorized Access Attempts</td>
                <td>Number of failed or suspicious login attempts to critical systems.</td>
                <td>≤ 3 per system</td>
                <td>Weekly</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Percentage of Unencrypted Sensitive Data</td>
                <td>Amount of sensitive data stored or transmitted without encryption.</td>
                <td>≤ 1%</td>
                <td>Monthly</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Insider Threat Indicators</td>
                <td>Number of detected abnormal user behaviors indicating insider threats.</td>
                <td>≤ 2 incidents</td>
                <td>Monthly</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Non-Compliance with Security Policies</td>
                <td>Percentage of employees or systems failing to comply with security policies.</td>
                <td>≤ 5%</td>
                <td>Quarterly</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Third-Party Security Risks</td>
                <td>Number of security vulnerabilities or non-compliance issues found in vendor risk assessments.</td>
                <td>≤ 2 per vendor</td>
                <td>Annually</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Unusual Network Traffic Spikes</td>
                <td>Frequency of unexpected network traffic surges, indicating a potential cyberattack.</td>
                <td>≤ 1 major anomaly</td>
                <td>Monthly</td>
            </tr>
        </tbody>
    </table>
    
@endsection
