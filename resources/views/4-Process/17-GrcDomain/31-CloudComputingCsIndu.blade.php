@extends('4-Process/17-GrcDomain/ProcessLayout')
@section('header')
    <h3>Cloud Computing</h3>
    <p>To ensure that all functions and staff within the Member Organization are aware of the agreed direction
        and position on hybrid and public cloud services, the required process to apply for hybrid and public
        cloud services, the risk appetite on hybrid and public cloud services and the specific cyber security
        requirements for hybrid and public cloud services.
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
        <h1>Cloud Computing</h1>
    </header>
    <article>
        <h3>1. Description of the Cloud Computing Technologies:</h3>
        <p>
            Cloud computing is a technology that enables organizations to store, manage, and process data on remote servers
            rather than on local infrastructure.
            It provides on-demand access to computing resources, including storage, networking, and applications, allowing
            businesses to scale operations efficiently.
            However, cloud computing introduces security challenges such as data breaches, misconfigurations, compliance
            risks, and unauthorized access.
            Organizations must adopt strong security measures, including encryption, identity management, and continuous
            monitoring, to ensure cloud environments remain secure.
        </p>

        <p>
            Effective cloud security strategies involve selecting reputable cloud service providers (CSPs), implementing
            access controls, and regularly auditing cloud environments.
            Compliance with cloud security standards, such as the NCA Cloud Cybersecurity Controls, ensures organizations
            maintain regulatory compliance and mitigate cyber threats.
            By leveraging advanced security tools, organizations can detect and respond to cloud-based threats in real time.
        </p>


        <h3>2. Basic Concepts of Cloud Computing</h3>
        <p>Cloud computing refers to the delivery of computing services—including servers, storage, databases, networking,
            software, and analytics—over the internet, often called "the cloud." Instead of maintaining physical
            infrastructure, organizations leverage cloud providers to access resources on demand. This model offers
            scalability, flexibility, and cost-effectiveness, allowing businesses to adjust resources based on their needs
            without significant upfront investment.</p>
        <p>One of the key benefits of cloud computing is enhanced accessibility and collaboration. Cloud services enable
            users to store and retrieve data from any location, improving remote work capabilities and real-time
            collaboration. Businesses utilize cloud models such as Infrastructure as a Service (IaaS), Platform as a Service
            (PaaS), and Software as a Service (SaaS) based on their operational needs. However, cloud adoption also
            introduces challenges such as data security risks, compliance concerns, and reliance on third-party providers.
        </p>
        <p>To ensure security in cloud environments, organizations must implement strong identity and access management
            (IAM), encryption protocols, regular security assessments, and compliance with industry standards such as ISO
            27017, NIST, and GDPR. A well-structured cloud security strategy helps businesses protect sensitive information,
            mitigate cyber threats, and ensure business continuity while leveraging the full benefits of cloud technology.
        </p>


        <h3>3. Key Performance Indicators (KPIs) in Cloud Computing</h3>
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
                    <td>Cloud Security Compliance</td>
                    <td>Measures adherence to cloud security frameworks and regulatory requirements.</td>
                    <td>Quarterly</td>
                </tr>
                <tr>
                    <td>Data Encryption Rate</td>
                    <td>Tracks the percentage of sensitive data encrypted in the cloud environment.</td>
                    <td>Monthly</td>
                </tr>
                <tr>
                    <td>Cloud Incident Response Time</td>
                    <td>Evaluates the average time taken to detect and respond to security incidents.</td>
                    <td>Continuous Monitoring</td>
                </tr>
                <tr>
                    <td>Access Control Effectiveness</td>
                    <td>Assesses the enforcement of identity and access management policies.</td>
                    <td>Monthly</td>
                </tr>
                <tr>
                    <td>Cloud System Uptime</td>
                    <td>Monitors the availability and reliability of cloud services.</td>
                    <td>Real-time</td>
                </tr>
            </tbody>
        </table>
        <h3>4. Cloud Security Products</h3>
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
                    <td>Microsoft Azure Security Center</td>
                    <td>Provides advanced threat protection and compliance monitoring for cloud environments.</td>
                    <td>NCA Cloud Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>Amazon GuardDuty</td>
                    <td>AI-powered threat detection service for AWS environments.</td>
                    <td>NCA Cloud Security Monitoring</td>
                </tr>
                <tr>
                    <td>Google Security Command Center</td>
                    <td>Cloud-native security management and risk assessment platform.</td>
                    <td>NCA Cloud Risk Management</td>
                </tr>
                <tr>
                    <td>Palo Alto Prisma Cloud</td>
                    <td>Comprehensive cloud security and compliance platform.</td>
                    <td>NCA Cloud Compliance</td>
                </tr>
                <tr>
                    <td>IBM Cloud Security</td>
                    <td>Provides AI-driven security analytics and compliance monitoring.</td>
                    <td>NCA Information Security</td>
                </tr>
                <tr>
                    <td>Trend Micro Cloud One</td>
                    <td>Automates cloud security and provides workload protection.</td>
                    <td>NCA Secure Cloud Deployment</td>
                </tr>
                <tr>
                    <td>McAfee MVISION Cloud</td>
                    <td>Ensures data security and compliance for SaaS, PaaS, and IaaS.</td>
                    <td>NCA Cloud Security Governance</td>
                </tr>
                <tr>
                    <td>Fortinet FortiCWP</td>
                    <td>Provides cloud workload protection and threat detection.</td>
                    <td>NCA Secure Cloud Architecture</td>
                </tr>
                <tr>
                    <td>Check Point CloudGuard</td>
                    <td>Secures cloud workloads with advanced threat prevention.</td>
                    <td>NCA Threat Management</td>
                </tr>
                <tr>
                    <td>Symantec Cloud Workload Protection</td>
                    <td>Automates security management for public and private clouds.</td>
                    <td>NCA Cloud Access Security</td>
                </tr>
            </tbody>
        </table>
        <h3>5. Summary</h3>
        <p>
            Cloud computing has transformed modern businesses by offering scalable and cost-effective solutions, but it also
            requires robust security controls.
            Organizations must adopt a multi-layered security approach, including encryption, access control, and threat
            detection, to protect sensitive cloud data.
            Compliance with cloud security standards ensures that businesses operate within regulatory frameworks while
            mitigating cyber risks.
            By leveraging cloud security solutions, organizations can enhance their security posture and maintain trust in
            their cloud-based services.
        </p>
    </article>
@endsection
