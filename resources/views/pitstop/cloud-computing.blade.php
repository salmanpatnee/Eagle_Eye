@extends('layouts.process')
@section('title', 'Cloud Computing')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Cloud Computing">
                To ensure that all functions and staff within the Member Organization are aware of the agreed direction
                and position on hybrid and public cloud services, the required process to apply for hybrid and public
                cloud services, the risk appetite on hybrid and public cloud services and the specific cyber security
                requirements for hybrid and public cloud services.
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
            <h1>Cloud Computing</h1>
        </header>
        <article>
            <h3>1. Description of the Cloud Computing Technologies:</h3>
            <p>
                Cloud computing is a technology that enables organizations to store, manage, and process data on remote
                servers
                rather than on local infrastructure.
                It provides on-demand access to computing resources, including storage, networking, and applications,
                allowing
                businesses to scale operations efficiently.
                However, cloud computing introduces security challenges such as data breaches, misconfigurations, compliance
                risks, and unauthorized access.
                Organizations must adopt strong security measures, including encryption, identity management, and continuous
                monitoring, to ensure cloud environments remain secure.
            </p>

            <p>
                Effective cloud security strategies involve selecting repux-table.table cloud service providers (CSPs),
                implementing
                access controls, and regularly auditing cloud environments.
                Compliance with cloud security standards, such as the NCA Cloud Cybersecurity Controls, ensures
                organizations
                maintain regulatory compliance and mitigate cyber threats.
                By leveraging advanced security tools, organizations can detect and respond to cloud-based threats in real
                time.
            </p>


            <h3>2. Basic Concepts of Cloud Computing</h3>
            <p>Cloud computing refers to the delivery of computing services—including servers, storage, databases,
                networking,
                software, and analytics—over the internet, often called "the cloud." Instead of maintaining physical
                infrastructure, organizations leverage cloud providers to access resources on demand. This model offers
                scalability, flexibility, and cost-effectiveness, allowing businesses to adjust resources based on their
                needs
                without significant upfront investment.</p>
            <p>One of the key benefits of cloud computing is enhanced accessibility and collaboration. Cloud services enable
                users to store and retrieve data from any location, improving remote work capabilities and real-time
                collaboration. Businesses utilize cloud models such as Infrastructure as a Service (IaaS), Platform as a
                Service
                (PaaS), and Software as a Service (SaaS) based on their operational needs. However, cloud adoption also
                introduces challenges such as data security risks, compliance concerns, and reliance on third-party
                providers.
            </p>
            <p>To ensure security in cloud environments, organizations must implement strong identity and access management
                (IAM), encryption protocols, regular security assessments, and compliance with industry standards such as
                ISO
                27017, NIST, and GDPR. A well-structured cloud security strategy helps businesses protect sensitive
                information,
                mitigate cyber threats, and ensure business continuity while leveraging the full benefits of cloud
                technology.
            </p>


            <h3>3. Key Performance Indicators (KPIs) in Cloud Computing</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="KPI Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Frequency" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Cloud Security Compliance</x-table.td>
                        <x-table.td>Measures adherence to cloud security frameworks and regulatory
                            requirements.</x-table.td>
                        <x-table.td>Quarterly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Data Encryption Rate</x-table.td>
                        <x-table.td>Tracks the percentage of sensitive data encrypted in the cloud environment.</x-table.td>
                        <x-table.td>Monthly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Cloud Incident Response Time</x-table.td>
                        <x-table.td>Evaluates the average time taken to detect and respond to security
                            incidents.</x-table.td>
                        <x-table.td>Continuous Monitoring</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Access Control Effectiveness</x-table.td>
                        <x-table.td>Assesses the enforcement of identity and access management policies.</x-table.td>
                        <x-table.td>Monthly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Cloud System Uptime</x-table.td>
                        <x-table.td>Monitors the availability and reliability of cloud services.</x-table.td>
                        <x-table.td>Real-time</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>4. Cloud Security Products</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="Product Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Relevant Standard" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Microsoft Azure Security Center</x-table.td>
                        <x-table.td>Provides advanced threat protection and compliance monitoring for cloud
                            environments.</x-table.td>
                        <x-table.td>NCA Cloud Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Amazon GuardDuty</x-table.td>
                        <x-table.td>AI-powered threat detection service for AWS environments.</x-table.td>
                        <x-table.td>NCA Cloud Security Monitoring</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Google Security Command Center</x-table.td>
                        <x-table.td>Cloud-native security management and risk assessment platform.</x-table.td>
                        <x-table.td>NCA Cloud Risk Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Palo Alto Prisma Cloud</x-table.td>
                        <x-table.td>Comprehensive cloud security and compliance platform.</x-table.td>
                        <x-table.td>NCA Cloud Compliance</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>IBM Cloud Security</x-table.td>
                        <x-table.td>Provides AI-driven security analytics and compliance monitoring.</x-table.td>
                        <x-table.td>NCA Information Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Trend Micro Cloud One</x-table.td>
                        <x-table.td>Automates cloud security and provides workload protection.</x-table.td>
                        <x-table.td>NCA Secure Cloud Deployment</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>McAfee MVISION Cloud</x-table.td>
                        <x-table.td>Ensures data security and compliance for SaaS, PaaS, and IaaS.</x-table.td>
                        <x-table.td>NCA Cloud Security Governance</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Fortinet FortiCWP</x-table.td>
                        <x-table.td>Provides cloud workload protection and threat detection.</x-table.td>
                        <x-table.td>NCA Secure Cloud Architecture</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Check Point CloudGuard</x-table.td>
                        <x-table.td>Secures cloud workloads with advanced threat prevention.</x-table.td>
                        <x-table.td>NCA Threat Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Symantec Cloud Workload Protection</x-table.td>
                        <x-table.td>Automates security management for public and private clouds.</x-table.td>
                        <x-table.td>NCA Cloud Access Security</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>5. Summary</h3>
            <p>
                Cloud computing has transformed modern businesses by offering scalable and cost-effective solutions, but it
                also
                requires robust security controls.
                Organizations must adopt a multi-layered security approach, including encryption, access control, and threat
                detection, to protect sensitive cloud data.
                Compliance with cloud security standards ensures that businesses operate within regulatory frameworks while
                mitigating cyber risks.
                By leveraging cloud security solutions, organizations can enhance their security posture and maintain trust
                in
                their cloud-based services.
            </p>
        </article>
    </div>
@endsection
