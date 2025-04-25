@extends('4-Process/17-GrcDomain/ProcessLayout')
@section('header')
    <h3>Asset Management</h3>
    <p>To support the Member Organization in having an accurate and up-to-date inventory and central insight
        in the physical / logical location and relevant details of all available information assets, in order to
        support
        its processes, such as financial, procurement, IT and cyber security processes.
    </p>
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
        <h1>Asset Management</h1>
    </header>
    <article>
        <h3>1. Description of Asset Management Technologies:</h3>
        <p>Asset management technologies are essential for tracking, monitoring, and securing an organization’s IT and
            physical assets to ensure compliance with NCA Essential Cybersecurity Controls (ECC), NCA Critical Cybersecurity
            Controls (CSCC), and NCA Data Cybersecurity Controls. These technologies help organizations identify, classify,
            and manage hardware, software, and data assets while ensuring security and regulatory compliance. IT Asset
            Management (ITAM) Systems provide real-time visibility into all assets, including endpoints, servers, and
            network devices. Configuration Management Databases (CMDBs) maintain a centralized inventory of IT assets and
            their relationships, enabling risk assessment and incident response. Endpoint Detection and Response (EDR)
            solutions ensure continuous monitoring of IT assets for security threats. RFID and GPS Tracking Technologies
            help organizations track physical assets, preventing theft and unauthorized movement. Software Asset Management
            (SAM) tools monitor software licenses and ensure compliance with cybersecurity policies. Automated Patch
            Management Systems enforce regular updates to protect assets from vulnerabilities. Cloud Asset Management
            Platforms enable organizations to monitor and secure cloud-based infrastructure. These technologies collectively
            enhance visibility, security, and compliance across an organization's asset ecosystem.</p>

        <h3>2. Basic Concepts of Asset Management</h3>
        <p>Asset management is a critical aspect of cybersecurity, ensuring that all hardware, software, and data assets
            within an organization are properly identified, tracked, and secured. Without a clear understanding of what
            assets exist and their associated risks, organizations become vulnerable to cyber threats, unauthorized access,
            and compliance violations. Effective asset management helps organizations maintain security, improve operational
            efficiency, and reduce risks related to unmanaged or outdated systems.</p>
        <p>One key component of asset management is asset inventory. Organizations must maintain a comprehensive and
            up-to-date list of all IT assets, including servers, workstations, mobile devices, cloud services, and software
            applications. This inventory should include details such as ownership, location, version, and security status.
            Automated asset discovery tools can help identify and track assets in real time, ensuring that no device or
            application is overlooked.</p>
        <p>Another important aspect is risk assessment and classification. Not all assets carry the same level of risk, so
            organizations should categorize them based on sensitivity, criticality, and compliance requirements. For
            example, databases containing customer financial information require higher security controls than general
            office software. Implementing access controls, encryption, and regular monitoring for high-risk assets ensures
            their protection against cyber threats.</p>
        <p>Additionally, organizations must enforce lifecycle management policies for all assets. This includes proper
            onboarding of new assets, ensuring regular updates and patch management, and secure decommissioning of outdated
            or retired devices. Improper disposal of assets, such as failing to wipe sensitive data from old hard drives,
            can lead to serious security breaches.</p>
        <p>By implementing a strong asset management framework, organizations can reduce security risks, improve regulatory
            compliance, and enhance overall cybersecurity posture.</p>

        <h3>3. Key Performance Indicators (KPIs) in Asset Management</h3>
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
                    <td>Asset Inventory Accuracy</td>
                    <td>Measures the percentage of correctly documented IT assets.</td>
                    <td>Annually (NCA Asset Mgmt)</td>
                </tr>
                <tr>
                    <td>Patch Compliance Rate</td>
                    <td>Tracks the percentage of assets updated with the latest security patches.</td>
                    <td>Monthly (NCA Security Updates)</td>
                </tr>
                <tr>
                    <td>Unauthorized Asset Detection Rate</td>
                    <td>Monitors the number of unauthorized or unmanaged assets detected.</td>
                    <td>Quarterly (NCA Threat Mgmt)</td>
                </tr>
                <tr>
                    <td>Asset Utilization Efficiency</td>
                    <td>Measures the percentage of IT assets actively in use.</td>
                    <td>Bi-Annually (NCA IT Governance)</td>
                </tr>
                <tr>
                    <td>Incident Response Time for Asset Breaches</td>
                    <td>Tracks the time taken to respond to security incidents related to assets.</td>
                    <td>Monthly (NCA Incident Mgmt)</td>
                </tr>
            </tbody>
        </table>
        <h3>4. Asset Management Products</h3>
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
                    <td>IT Asset Management (ITAM) Systems</td>
                    <td>Tracks and manages IT hardware and software assets.</td>
                    <td>NCA Asset Management</td>
                </tr>
                <tr>
                    <td>Configuration Management Database (CMDB)</td>
                    <td>Maintains an inventory of IT assets and their relationships.</td>
                    <td>NCA Cybersecurity Governance</td>
                </tr>
                <tr>
                    <td>Endpoint Detection & Response (EDR)</td>
                    <td>Monitors and protects endpoints from security threats.</td>
                    <td>NCA Cybersecurity Defense</td>
                </tr>
                <tr>
                    <td>RFID & GPS Asset Tracking Solutions</td>
                    <td>Provides real-time tracking of physical IT assets.</td>
                    <td>NCA Physical Security</td>
                </tr>
                <tr>
                    <td>Software Asset Management (SAM) Tools</td>
                    <td>Ensures software compliance and license management.</td>
                    <td>NCA Compliance Management</td>
                </tr>
                <tr>
                    <td>Cloud Asset Management Platforms</td>
                    <td>Monitors cloud-based infrastructure and security risks.</td>
                    <td>NCA Cloud Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>Automated Patch Management Systems</td>
                    <td>Ensures all IT assets are updated with the latest security patches.</td>
                    <td>NCA Vulnerability Management</td>
                </tr>
                <tr>
                    <td>Mobile Device Management (MDM)</td>
                    <td>Controls and secures mobile IT assets.</td>
                    <td>NCA Mobile Security</td>
                </tr>
                <tr>
                    <td>Secure Configuration Management Tools</td>
                    <td>Automates asset security configurations and compliance checks.</td>
                    <td>NCA Secure Configuration</td>
                </tr>
                <tr>
                    <td>Data Loss Prevention (DLP) Solutions</td>
                    <td>Protects sensitive data stored on IT assets from unauthorized access.</td>
                    <td>NCA Data Cybersecurity Controls</td>
                </tr>
            </tbody>
        </table>
        <h3>5. Summary</h3>
        <p>Asset management is a fundamental component of cybersecurity, ensuring that IT and physical assets are tracked,
            secured, and compliant with regulatory frameworks like NCA Essential Cybersecurity Controls and NCA Data
            Cybersecurity Controls. Organizations must implement IT Asset Management (ITAM) Systems, CMDBs, RFID tracking,
            EDR, and automated patch management tools to maintain a secure and compliant asset inventory. Key performance
            indicators (KPIs) such as asset inventory accuracy, patch compliance, and unauthorized asset detection rates
            help measure the effectiveness of asset management programs. A well-defined asset management strategy enhances
            visibility, security, and operational efficiency, reducing cyber risks and ensuring long-term cybersecurity
            resilience.</p>
    </article>
@endsection
