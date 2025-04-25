@extends('4-Process/17-GrcDomain/ProcessLayout')
@section('header')
    <h3>Identity and Access Management (IAM)</h3>
    <p>To ensure that the Member Organization only provides authorized and sufficient access privileges to
        approved users.</p>
@endsection
@section('boxes')
    <div class="rowsec">
        <div id="VideoExplanation">
            <div class="itemsec">
                <i class='bx bxs-videos'></i>
                <p>Video Explanation</p>
            </div>
        </div>
        <div>
            <div class="itemsec">
                <div>
                    <div id="ImplementationDocs">
                        <i class='bx bxs-file-doc'></i>
                    </div>
                    <div id="ImplementationPdf">
                        <i class='bx bxs-file-pdf'></i>
                    </div>
                </div>
                <p>Implementation Templates</p>
            </div>
        </div>
    </div>
    <div class="rowsec">
        <div id="Checklist">
            <div class="itemsec">
                <i class='bx bxs-file'></i>
                <p>Checklist for CISO</p>
            </div>
        </div>
        <div id="Glossary">
            <div class="itemsec">
                <img class="imgicon" src="/Images/8-TransIcon.png">
                <p>Arabic English Glossary</p>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <header class="text-center">
        <h1>Identity and Access Management (IAM)</h1>
    </header>
    <article>
        <h3>1. Description of the Identity and Access Management (IAM) Technologies:</h3>
        <p>Identity and Access Management (IAM) is a framework of policies, technologies, and processes designed to ensure
            that only authorized individuals have access to the right resources at the right time. IAM enhances security by
            managing user identities, enforcing authentication, and controlling access permissions across an organization's
            digital environment.</p>

        <h3>2. Basic Concepts of Identity and Access Management</h3>
        <p>Identity and Access Management (IAM) is a crucial component of cybersecurity that ensures the right individuals
            have the appropriate access to systems, applications, and data while preventing unauthorized access. IAM
            frameworks help organizations protect sensitive information by implementing authentication, authorization, and
            auditing processes to manage user identities and access privileges securely.</p>
        <p>A robust IAM system includes Multi-Factor Authentication (MFA), Single Sign-On (SSO), Role-Based Access Control
            (RBAC), and Privileged Access Management (PAM). These measures ensure that users are authenticated properly
            before accessing resources, reducing the risk of unauthorized access, insider threats, and credential theft. IAM
            also plays a critical role in Zero Trust Security, where access is granted on a least-privilege basis, requiring
            continuous verification of user identity and behavior.</p>
        <p>IAM solutions also help organizations comply with regulatory requirements such as NIST, GDPR, ISO 27001, and NCA
            Cybersecurity Standards by maintaining detailed logs, audit trails, and access reviews. Implementing an
            effective IAM strategy ensures data confidentiality, integrity, and availability, reducing cybersecurity risks
            while enhancing operational efficiency and user experience.</p>

        <h3>3. Key Performance Indicators (KPIs) in IAM technologies</h3>
        <table>
            <thead>
                <tr>
                    <th>KPI Name</th>
                    <th>Description</th>
                    <th>Frequency</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Authentication Success Rate</td>
                    <td>Measures the percentage of successful user logins versus failed attempts.</td>
                    <td>Daily</td>
                </tr>
                <tr>
                    <td>Multi-Factor Authentication Adoption</td>
                    <td>Tracks the percentage of users enabled for MFA.</td>
                    <td>Monthly</td>
                </tr>
                <tr>
                    <td>Number of Unauthorized Access Attempts</td>
                    <td>Monitors and reports suspicious login attempts.</td>
                    <td>Weekly</td>
                </tr>
                <tr>
                    <td>Privileged Account Usage</td>
                    <td>Measures the frequency and usage of privileged accounts.</td>
                    <td>Monthly</td>
                </tr>
                <tr>
                    <td>User Access Review Compliance</td>
                    <td>Ensures periodic review of user access rights and privileges.</td>
                    <td>Quarterly</td>
                </tr>
            </tbody>
        </table>
        <h3>4. Cybersecurity Governance Products</h3>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Relevant Standard</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Microsoft Azure Active Directory (Azure AD)</td>
                    <td>Provides identity and access management for cloud and on-premises resources.</td>
                    <td>NCA Identity & Access Management</td>
                </tr>
                <tr>
                    <td>Okta Identity Cloud</td>
                    <td>A cloud-based IAM solution for SSO, MFA, and user lifecycle management.</td>
                    <td>NCA Identity & Access Management</td>
                </tr>
                <tr>
                    <td>IBM Security Verify</td>
                    <td>Offers AI-driven identity management, authentication, and access control.</td>
                    <td>NCA Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>Ping Identity</td>
                    <td>Delivers secure authentication, access control, and API security solutions.</td>
                    <td>NCA Identity & Access Management</td>
                </tr>
                <tr>
                    <td>CyberArk Privileged Access Security</td>
                    <td>Protects privileged accounts and enforces least privilege policies.</td>
                    <td>NCA Critical Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>RSA SecurID</td>
                    <td>Provides two-factor and multi-factor authentication for secure access.</td>
                    <td>NCA Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>Google Cloud Identity</td>
                    <td>Manages identity, access, and security policies in cloud environments.</td>
                    <td>NCA Cloud Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>SailPoint IdentityNow</td>
                    <td>Offers AI-powered identity governance for managing user access.</td>
                    <td>NCA Identity & Access Management</td>
                </tr>
                <tr>
                    <td>ForgeRock Identity Platform</td>
                    <td>Provides enterprise IAM solutions for secure authentication and authorization.</td>
                    <td>NCA Cybersecurity Governance</td>
                </tr>
                <tr>
                    <td>Duo Security (Cisco)</td>
                    <td>Delivers adaptive MFA and secure remote access solutions.</td>
                    <td>NCA Telework Cybersecurity Control</td>
                </tr>
            </tbody>
        </table>
        <h3>5. Summary</h3>
        <p>Identity and Access Management (IAM) is essential for securing an organization’s digital environment by enforcing
            authentication and access policies. By implementing IAM solutions such as SSO, MFA, RBAC, and PAM, organizations
            can mitigate risks associated with unauthorized access and insider threats. Key performance indicators like
            authentication success rate, MFA adoption, and unauthorized access attempts help measure IAM effectiveness.</p>
    </article>
@endsection
