@extends('layouts.process')
@section('title', 'Identity and Access Management (IAM)')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Identity and Access Management (IAM)">
                To ensure that the Member Organization only provides authorized and sufficient access privileges to
                approved users.
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
            <h1>Identity and Access Management (IAM)</h1>
        </header>
        <article>
            <h3>1. Description of the Identity and Access Management (IAM) Technologies:</h3>
            <p>Identity and Access Management (IAM) is a framework of policies, technologies, and processes designed to
                ensure
                that only authorized individuals have access to the right resources at the right time. IAM enhances security
                by
                managing user identities, enforcing authentication, and controlling access permissions across an
                organization's
                digital environment.</p>

            <h3>2. Basic Concepts of Identity and Access Management</h3>
            <p>Identity and Access Management (IAM) is a crucial component of cybersecurity that ensures the right
                individuals
                have the appropriate access to systems, applications, and data while preventing unauthorized access. IAM
                frameworks help organizations protect sensitive information by implementing authentication, authorization,
                and
                auditing processes to manage user identities and access privileges securely.</p>
            <p>A robust IAM system includes Multi-Factor Authentication (MFA), Single Sign-On (SSO), Role-Based Access
                Control
                (RBAC), and Privileged Access Management (PAM). These measures ensure that users are authenticated properly
                before accessing resources, reducing the risk of unauthorized access, insider threats, and credential theft.
                IAM
                also plays a critical role in Zero Trust Security, where access is granted on a least-privilege basis,
                requiring
                continuous verification of user identity and behavior.</p>
            <p>IAM solutions also help organizations comply with regulatory requirements such as NIST, GDPR, ISO 27001, and
                NCA
                Cybersecurity Standards by maintaining detailed logs, audit trails, and access reviews. Implementing an
                effective IAM strategy ensures data confidentiality, integrity, and availability, reducing cybersecurity
                risks
                while enhancing operational efficiency and user experience.</p>

            <h3>3. Key Performance Indicators (KPIs) in IAM technologies</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="KPI Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Frequency" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Authentication Success Rate</x-table.td>
                        <x-table.td>Measures the percentage of successful user logins versus failed attempts.</x-table.td>
                        <x-table.td>Daily</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Multi-Factor Authentication Adoption</x-table.td>
                        <x-table.td>Tracks the percentage of users enabled for MFA.</x-table.td>
                        <x-table.td>Monthly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Number of Unauthorized Access Attempts</x-table.td>
                        <x-table.td>Monitors and reports suspicious login attempts.</x-table.td>
                        <x-table.td>Weekly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Privileged Account Usage</x-table.td>
                        <x-table.td>Measures the frequency and usage of privileged accounts.</x-table.td>
                        <x-table.td>Monthly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>User Access Review Compliance</x-table.td>
                        <x-table.td>Ensures periodic review of user access rights and privileges.</x-table.td>
                        <x-table.td>Quarterly</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>4. Cybersecurity Governance Products</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="Product Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Relevant Standard" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Microsoft Azure Active Directory (Azure AD)</x-table.td>
                        <x-table.td>Provides identity and access management for cloud and on-premises
                            resources.</x-table.td>
                        <x-table.td>NCA Identity & Access Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Okta Identity Cloud</x-table.td>
                        <x-table.td>A cloud-based IAM solution for SSO, MFA, and user lifecycle management.</x-table.td>
                        <x-table.td>NCA Identity & Access Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>IBM Security Verify</x-table.td>
                        <x-table.td>Offers AI-driven identity management, authentication, and access control.</x-table.td>
                        <x-table.td>NCA Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Ping Identity</x-table.td>
                        <x-table.td>Delivers secure authentication, access control, and API security solutions.</x-table.td>
                        <x-table.td>NCA Identity & Access Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>CyberArk Privileged Access Security</x-table.td>
                        <x-table.td>Protects privileged accounts and enforces least privilege policies.</x-table.td>
                        <x-table.td>NCA Critical Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>RSA SecurID</x-table.td>
                        <x-table.td>Provides two-factor and multi-factor authentication for secure access.</x-table.td>
                        <x-table.td>NCA Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Google Cloud Identity</x-table.td>
                        <x-table.td>Manages identity, access, and security policies in cloud environments.</x-table.td>
                        <x-table.td>NCA Cloud Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>SailPoint IdentityNow</x-table.td>
                        <x-table.td>Offers AI-powered identity governance for managing user access.</x-table.td>
                        <x-table.td>NCA Identity & Access Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>ForgeRock Identity Platform</x-table.td>
                        <x-table.td>Provides enterprise IAM solutions for secure authentication and
                            authorization.</x-table.td>
                        <x-table.td>NCA Cybersecurity Governance</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Duo Security (Cisco)</x-table.td>
                        <x-table.td>Delivers adaptive MFA and secure remote access solutions.</x-table.td>
                        <x-table.td>NCA Telework Cybersecurity Control</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>5. Summary</h3>
            <p>Identity and Access Management (IAM) is essential for securing an organization’s digital environment by
                enforcing
                authentication and access policies. By implementing IAM solutions such as SSO, MFA, RBAC, and PAM,
                organizations
                can mitigate risks associated with unauthorized access and insider threats. Key performance indicators like
                authentication success rate, MFA adoption, and unauthorized access attempts help measure IAM effectiveness.
            </p>
        </article>
    </div>
@endsection
