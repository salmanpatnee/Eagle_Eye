@extends('layouts.pitstop')
@section('title', 'Asset Management')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Asset Management">
                To support the Member Organization in having an accurate and up-to-date inventory and central insight
                in the physical / logical location and relevant details of all available information assets, in order to
                support
                its processes, such as financial, procurement, IT and cyber security processes.
            </x-iso-content-card>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
            <div class="flex flex-col gap-6">
                <x-iso-checklist link="#" />
                <x-iso-glossary link="#" />
            </div>
            <div class="flex flex-col gap-6">
                <x-iso-video link="#" />
                <x-iso-templates link="#" />
            </div>
        </div>
    </div>
@endsection

@section('additional_content')

    <div class="bg-white my-6 p-5 rounded-2xl process-content">
        <header class="text-center bg-brand-950 font-bold inline mb-3 p-3 rounded-md text-white">
            <h1>Asset Management</h1>
        </header>



        <article>
            <h3>1. Description of Asset Management Technologies:</h3>
            <p>Asset management technologies are essential for tracking, monitoring, and securing an organization’s IT and
                physical assets to ensure compliance with NCA Essential Cybersecurity Controls (ECC), NCA Critical
                Cybersecurity
                Controls (CSCC), and NCA Data Cybersecurity Controls. These technologies help organizations identify,
                classify,
                and manage hardware, software, and data assets while ensuring security and regulatory compliance. IT Asset
                Management (ITAM) Systems provide real-time visibility into all assets, including endpoints, servers, and
                network devices. Configuration Management Databases (CMDBs) maintain a centralized inventory of IT assets
                and
                their relationships, enabling risk assessment and incident response. Endpoint Detection and Response (EDR)
                solutions ensure continuous monitoring of IT assets for security threats. RFID and GPS Tracking Technologies
                help organizations track physical assets, preventing theft and unauthorized movement. Software Asset
                Management
                (SAM) tools monitor software licenses and ensure compliance with cybersecurity policies. Automated Patch
                Management Systems enforce regular updates to protect assets from vulnerabilities. Cloud Asset Management
                Platforms enable organizations to monitor and secure cloud-based infrastructure. These technologies
                collectively
                enhance visibility, security, and compliance across an organization's asset ecosystem.</p>

            <h3>2. Basic Concepts of Asset Management</h3>
            <p>Asset management is a critical aspect of cybersecurity, ensuring that all hardware, software, and data assets
                within an organization are properly identified, tracked, and secured. Without a clear understanding of what
                assets exist and their associated risks, organizations become vulnerable to cyber threats, unauthorized
                access,
                and compliance violations. Effective asset management helps organizations maintain security, improve
                operational
                efficiency, and reduce risks related to unmanaged or oux-table.tdated systems.</p>
            <p>One key component of asset management is asset inventory. Organizations must maintain a comprehensive and
                up-to-date list of all IT assets, including servers, workstations, mobile devices, cloud services, and
                software
                applications. This inventory should include details such as ownership, location, version, and security
                status.
                Automated asset discovery tools can help identify and track assets in real time, ensuring that no device or
                application is overlooked.</p>
            <p>Another important aspect is risk assessment and classification. Not all assets carry the same level of risk,
                so
                organizations should categorize them based on sensitivity, criticality, and compliance requirements. For
                example, databases containing customer financial information require higher security controls than general
                office software. Implementing access controls, encryption, and regular monitoring for high-risk assets
                ensures
                their protection against cyber threats.</p>
            <p>Additionally, organizations must enforce lifecycle management policies for all assets. This includes proper
                onboarding of new assets, ensuring regular updates and patch management, and secure decommissioning of
                oux-table.tdated
                or retired devices. Improper disposal of assets, such as failing to wipe sensitive data from old hard
                drives,
                can lead to serious security breaches.</p>
            <p>By implementing a strong asset management framework, organizations can reduce security risks, improve
                regulatory
                compliance, and enhance overall cybersecurity posture.</p>

            <h3>3. Key Performance Indicators (KPIs) in Asset Management</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="KPI Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Frequency" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Asset Inventory Accuracy</x-table.td>
                        <x-table.td>Measures the percentage of correctly documented IT assets.</x-table.td>
                        <x-table.td>Annually (NCA Asset Mgmt)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Patch Compliance Rate</x-table.td>
                        <x-table.td>Tracks the percentage of assets updated with the latest security patches.</x-table.td>
                        <x-table.td>Monthly (NCA Security Updates)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Unauthorized Asset Detection Rate</x-table.td>
                        <x-table.td>Monitors the number of unauthorized or unmanaged assets detected.</x-table.td>
                        <x-table.td>Quarterly (NCA Threat Mgmt)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Asset Utilization Efficiency</x-table.td>
                        <x-table.td>Measures the percentage of IT assets actively in use.</x-table.td>
                        <x-table.td>Bi-Annually (NCA IT Governance)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Incident Response Time for Asset Breaches</x-table.td>
                        <x-table.td>Tracks the time taken to respond to security incidents related to assets.</x-table.td>
                        <x-table.td>Monthly (NCA Incident Mgmt)</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>4. Asset Management Products</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="Product Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Relevant Standard" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>IT Asset Management (ITAM) Systems</x-table.td>
                        <x-table.td>Tracks and manages IT hardware and software assets.</x-table.td>
                        <x-table.td>NCA Asset Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Configuration Management Database (CMDB)</x-table.td>
                        <x-table.td>Maintains an inventory of IT assets and their relationships.</x-table.td>
                        <x-table.td>NCA Cybersecurity Governance</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Endpoint Detection & Response (EDR)</x-table.td>
                        <x-table.td>Monitors and protects endpoints from security threats.</x-table.td>
                        <x-table.td>NCA Cybersecurity Defense</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>RFID & GPS Asset Tracking Solutions</x-table.td>
                        <x-table.td>Provides real-time tracking of physical IT assets.</x-table.td>
                        <x-table.td>NCA Physical Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Software Asset Management (SAM) Tools</x-table.td>
                        <x-table.td>Ensures software compliance and license management.</x-table.td>
                        <x-table.td>NCA Compliance Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Cloud Asset Management Platforms</x-table.td>
                        <x-table.td>Monitors cloud-based infrastructure and security risks.</x-table.td>
                        <x-table.td>NCA Cloud Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Automated Patch Management Systems</x-table.td>
                        <x-table.td>Ensures all IT assets are updated with the latest security patches.</x-table.td>
                        <x-table.td>NCA Vulnerability Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Mobile Device Management (MDM)</x-table.td>
                        <x-table.td>Controls and secures mobile IT assets.</x-table.td>
                        <x-table.td>NCA Mobile Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Secure Configuration Management Tools</x-table.td>
                        <x-table.td>Automates asset security configurations and compliance checks.</x-table.td>
                        <x-table.td>NCA Secure Configuration</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Data Loss Prevention (DLP) Solutions</x-table.td>
                        <x-table.td>Protects sensitive data stored on IT assets from unauthorized access.</x-table.td>
                        <x-table.td>NCA Data Cybersecurity Controls</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>5. Summary</h3>
            <p>Asset management is a fundamental component of cybersecurity, ensuring that IT and physical assets are
                tracked,
                secured, and compliant with regulatory frameworks like NCA Essential Cybersecurity Controls and NCA Data
                Cybersecurity Controls. Organizations must implement IT Asset Management (ITAM) Systems, CMDBs, RFID
                tracking,
                EDR, and automated patch management tools to maintain a secure and compliant asset inventory. Key
                performance
                indicators (KPIs) such as asset inventory accuracy, patch compliance, and unauthorized asset detection rates
                help measure the effectiveness of asset management programs. A well-defined asset management strategy
                enhances
                visibility, security, and operational efficiency, reducing cyber risks and ensuring long-term cybersecurity
                resilience.</p>
        </article>
    @endsection
