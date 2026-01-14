@extends('layouts.ciso-full')
@section('title', 'End-Point Detection and Response (EDR)')
@section('title_ar', '')
@section('content')


    <div class="px-7 process-content">
        <h2 class="bg-brand-950 font-bold mb-3 p-3 rounded-md text-white mt-7">Technology Background</h2>
        <p>Endpoint Detection and Response (EDR) technologies are advanced cybersecurity solutions designed to monitor,
            detect, and respond to threats at the endpoint level. EDR solutions provide continuous visibility into endpoint
            activities, enabling security teams to identify and mitigate threats such as malware, ransomware, and fileless
            attacks in real time. Unlike traditional antivirus solutions, which rely on signature-based detection, EDR
            incorporates behavioral analytics, artificial intelligence (AI), and machine learning to detect sophisticated
            attack patterns. By analyzing endpoint telemetry, EDR solutions can detect anomalies, investigate security
            incidents, and facilitate rapid incident response.</p>
        <p>EDR solutions collect and analyze endpoint data, including file executions, registry modifications, network
            connections, and process behaviors. This data is then processed using threat intelligence feeds and AI-driven
            analytics to identify indicators of compromise (IOCs) and indicators of attack (IOAs). Security teams can
            leverage automated response mechanisms such as isolation of compromised endpoints, rollback of malicious
            changes, and execution of predefined remediation workflows. Additionally, EDR platforms integrate with Security
            Information and Event Management (SIEM) and Security Orchestration, Automation, and Response (SOAR) systems to
            enhance threat detection and incident response capabilities.</p>
        <p>With the increasing complexity of cyber threats and the adoption of remote work environments, EDR solutions are
            evolving to incorporate Extended Detection and Response (XDR), which provides a more comprehensive approach by
            integrating telemetry from multiple security layers such as email, cloud, and network security. The future of
            EDR technologies will focus on AI-powered automation, zero-trust security frameworks, and proactive threat
            hunting capabilities to strengthen endpoint security against advanced persistent threats (APTs) and zero-day
            exploits.</p>
        <h3 class="bg-black font-bold  my-6 p-3 rounded-md text-white secondary-heading">2. Justification of Technology
            Deployment Based
            on Regulatory and Cybersecurity Controls</h3>
        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" />
                <x-table.th label="Cybersecurity Standard" />
                <x-table.th label="Relevant Control Number" />
                <x-table.th label="Control Description" />
            </x-table.thead>
            <x-table.tbody>
                <tr>
                    <x-table.td>1</x-table.td>
                    <x-table.td>NCA - Essential Cybersecurity Controls</x-table.td>
                    <x-table.td>NCA-ECC2-2.17.3</x-table.td>
                    <x-table.td>Implement EDR solutions to monitor and detect endpoint threats.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>2</x-table.td>
                    <x-table.td>NCA - Critical Cybersecurity Controls</x-table.td>
                    <x-table.td>NCA-CSCC-4.16.2</x-table.td>
                    <x-table.td>Enforce real-time threat intelligence for endpoint security.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>3</x-table.td>
                    <x-table.td>NCA - Cloud Cybersecurity Controls</x-table.td>
                    <x-table.td>NCA-CCC-3.17.1</x-table.td>
                    <x-table.td>Deploy EDR solutions to secure cloud-based endpoints.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>4</x-table.td>
                    <x-table.td>NCA - Telework Cybersecurity Controls</x-table.td>
                    <x-table.td>NCA-TCC-5.14.4</x-table.td>
                    <x-table.td>Protect remote devices from advanced cyber threats using EDR.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>5</x-table.td>
                    <x-table.td>NCA - Organization Social Media Account Cybersecurity Controls</x-table.td>
                    <x-table.td>NCA-OSMACC-6.17.2</x-table.td>
                    <x-table.td>Monitor endpoint activities for threats related to social media accounts.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>6</x-table.td>
                    <x-table.td>NCA - Data Cybersecurity Controls</x-table.td>
                    <x-table.td>NCA-DCC-7.15.5</x-table.td>
                    <x-table.td>Ensure endpoint security to prevent unauthorized data exfiltration.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>7</x-table.td>
                    <x-table.td>SAMA - Cybersecurity Framework</x-table.td>
                    <x-table.td>SAMA-CSF-2.16.3</x-table.td>
                    <x-table.td>Implement endpoint monitoring and response mechanisms for financial security.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>8</x-table.td>
                    <x-table.td>Personal Data Protection Law (PDPL)</x-table.td>
                    <x-table.td>PDPL-4.16.1</x-table.td>
                    <x-table.td>Secure personal data by detecting and responding to endpoint-based threats.</x-table.td>
                </tr>
            </x-table.tbody>
        </x-table.table>
        <h3 class="bg-black font-bold  my-6 p-3 rounded-md text-white secondary-heading">3. Gartner Magic Quadrant
            Leaders for Endpoint
            Detection and Response (EDR)</h3>
        <x-table.table>
            <x-table.thead>
                <tr>
                    <x-table.th label="S.No" />
                    <x-table.th label="Product Name" />
                    <x-table.th label="Vendor" />
                    <x-table.th label="Description" />
            </x-table.thead>
            <x-table.tbody>
                <tr>
                    <x-table.td>1</x-table.td>
                    <x-table.td>Microsoft Defender for Endpoint</x-table.td>
                    <x-table.td>Microsoft</x-table.td>
                    <x-table.td>AI-driven EDR with integrated threat intelligence.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>2</x-table.td>
                    <x-table.td>CrowdStrike Falcon</x-table.td>
                    <x-table.td>CrowdStrike</x-table.td>
                    <x-table.td>Cloud-native EDR with behavioral AI and threat hunting.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>3</x-table.td>
                    <x-table.td>SentinelOne Singularity</x-table.td>
                    <x-table.td>SentinelOne</x-table.td>
                    <x-table.td>Autonomous EDR with AI-powered threat prevention.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>4</x-table.td>
                    <x-table.td>Palo Alto Cortex XDR</x-table.td>
                    <x-table.td>Palo Alto Networks</x-table.td>
                    <x-table.td>Extended detection and response with endpoint protection.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>5</x-table.td>
                    <x-table.td>Trend Micro Apex One</x-table.td>
                    <x-table.td>Trend Micro</x-table.td>
                    <x-table.td>AI-based EDR with integrated risk assessment.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>6</x-table.td>
                    <x-table.td>Symantec Endpoint Detection and Response</x-table.td>
                    <x-table.td>Broadcom</x-table.td>
                    <x-table.td>Enterprise-class EDR with forensic analysis.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>7</x-table.td>
                    <x-table.td>Sophos Intercept X</x-table.td>
                    <x-table.td>Sophos</x-table.td>
                    <x-table.td>Deep learning-powered EDR with automated rollback.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>8</x-table.td>
                    <x-table.td>VMware Carbon Black EDR</x-table.td>
                    <x-table.td>VMware</x-table.td>
                    <x-table.td>Cloud-based EDR with live response capabilities.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>9</x-table.td>
                    <x-table.td>Check Point Harmony Endpoint</x-table.td>
                    <x-table.td>Check Point</x-table.td>
                    <x-table.td>Zero-trust EDR with threat prevention features.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>10</x-table.td>
                    <x-table.td>Cisco Secure Endpoint</x-table.td>
                    <x-table.td>Cisco</x-table.td>
                    <x-table.td>AI-enhanced endpoint security with behavioral detection.</x-table.td>
                </tr>
            </x-table.tbody>
        </x-table.table>
        <h3 class="bg-black font-bold  my-6 p-3 rounded-md text-white secondary-heading">4. Commercial EDR Products
        </h3>
        <x-table.table>
            <x-table.thead>
                <tr>
                    <x-table.th label="S.No" />
                    <x-table.th label="Product Name" />
                    <x-table.th label="Vendor" />
                    <x-table.th label="Deployment Model" />
                    <x-table.th label="Description" />
            </x-table.thead>
            <x-table.tbody>
                <tr>
                    <x-table.td>1</x-table.td>
                    <x-table.td>Microsoft Defender for Endpoint</x-table.td>
                    <x-table.td>Microsoft</x-table.td>
                    <x-table.td>Cloud-based</x-table.td>
                    <x-table.td>AI-driven endpoint protection and response.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>2</x-table.td>
                    <x-table.td>CrowdStrike Falcon</x-table.td>
                    <x-table.td>CrowdStrike</x-table.td>
                    <x-table.td>Cloud-based</x-table.td>
                    <x-table.td>Cloud-native EDR with automated threat hunting.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>3</x-table.td>
                    <x-table.td>SentinelOne Singularity</x-table.td>
                    <x-table.td>SentinelOne</x-table.td>
                    <x-table.td>Cloud & On-Prem</x-table.td>
                    <x-table.td>Autonomous endpoint protection with behavioral AI.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>4</x-table.td>
                    <x-table.td>Palo Alto Cortex XDR</x-table.td>
                    <x-table.td>Palo Alto Networks</x-table.td>
                    <x-table.td>Cloud & On-Prem</x-table.td>
                    <x-table.td>XDR integration for advanced endpoint security.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>5</x-table.td>
                    <x-table.td>Trend Micro Apex One</x-table.td>
                    <x-table.td>Trend Micro</x-table.td>
                    <x-table.td>Cloud & On-Prem</x-table.td>
                    <x-table.td>AI-powered threat detection and response.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>6</x-table.td>
                    <x-table.td>Symantec Endpoint Detection and Response</x-table.td>
                    <x-table.td>Broadcom</x-table.td>
                    <x-table.td>On-Prem & Cloud</x-table.td>
                    <x-table.td>Enterprise-class EDR with forensic capabilities.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>7</x-table.td>
                    <x-table.td>Sophos Intercept X</x-table.td>
                    <x-table.td>Sophos</x-table.td>
                    <x-table.td>Cloud-based</x-table.td>
                    <x-table.td>Deep learning-based endpoint protection.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>8</x-table.td>
                    <x-table.td>VMware Carbon Black EDR</x-table.td>
                    <x-table.td>VMware</x-table.td>
                    <x-table.td>Cloud-based</x-table.td>
                    <x-table.td>AI-powered behavioral analysis for endpoint threats.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>9</x-table.td>
                    <x-table.td>Check Point Harmony Endpoint</x-table.td>
                    <x-table.td>Check Point</x-table.td>
                    <x-table.td>Cloud & On-Prem</x-table.td>
                    <x-table.td>Zero-trust endpoint security and ransomware protection.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>10</x-table.td>
                    <x-table.td>Cisco Secure Endpoint</x-table.td>
                    <x-table.td>Cisco</x-table.td>
                    <x-table.td>Cloud-based</x-table.td>
                    <x-table.td>Integrated EDR with AI-driven analytics.</x-table.td>
                </tr>
            </x-table.tbody>
        </x-table.table>
        <h3 class="bg-black font-bold  my-6 p-3 rounded-md text-white secondary-heading">5. Top 10 Challenges Related
            to EDR</h3>
        <ol>
            <li>High volume of endpoint data leading to alert fatigue.</li>
            <li>Complexity in integrating EDR with existing security frameworks.</li>
            <li>Managing false positives and tuning detection rules.</li>
            <li>Ensuring real-time response without impacting business operations.</li>
            <li>Lack of skilled professionals to analyze EDR-generated threats.</li>
            <li>Handling sophisticated fileless and memory-based attacks.</li>
            <li>Compliance and regulatory challenges in multi-cloud environments.</li>
            <li>Balancing security with endpoint performance.</li>
            <li>Need for continuous updates to counter evolving threats.</li>
            <li>Managing EDR across hybrid and remote work environments.</li>
        </ol>
        <h3 class="bg-black font-bold  my-6 p-3 rounded-md text-white secondary-heading">6. Key Features of Top 10 EDR
            Products</h3>
        <x-table.table>
            <x-table.thead>
                <tr>
                    <x-table.th label="S.No" />
                    <x-table.th label="Product Name" />
                    <x-table.th label="Key Features" />
            </x-table.thead>
            <x-table.tbody>
                <tr>
                    <x-table.td>1</x-table.td>
                    <x-table.td>Microsoft Defender for Endpoint</x-table.td>
                    <x-table.td>AI-driven threat detection, behavioral analytics,
                        automated
                        investigation and response,
                        deep
                        integration
                        with Microsoft 365 security suite.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>2</x-table.td>
                    <x-table.td>CrowdStrike Falcon</x-table.td>
                    <x-table.td>Cloud-native EDR, AI-powered threat intelligence,
                        real-time
                        attack
                        visibility, proactive
                        threat
                        hunting.
                    </x-table.td>
                </tr>
                <tr>
                    <x-table.td>3</x-table.td>
                    <x-table.td>SentinelOne Singularity</x-table.td>
                    <x-table.td>AI-driven autonomous response, rollback capability,
                        behavioral
                        AI
                        engine, zero-day
                        threat detection.
                    </x-table.td>
                </tr>
                <tr>
                    <x-table.td>4</x-table.td>
                    <x-table.td>Palo Alto Cortex XDR</x-table.td>
                    <x-table.td>Machine learning-based threat detection, endpoint and
                        network
                        data
                        correlation,
                        automated incident
                        response.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>5</x-table.td>
                    <x-table.td>Trend Micro Apex One</x-table.td>
                    <x-table.td>AI-powered malware detection, behavior analysis,
                        extended threat
                        protection across
                        endpoints and
                        servers.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>6</x-table.td>
                    <x-table.td>Symantec Endpoint Detection and Response</x-table.td>
                    <x-table.td>AI-based threat detection, forensic analysis, real-time
                        incident
                        response, deep
                        integration with
                        Broadcom security solutions.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>7</x-table.td>
                    <x-table.td>Sophos Intercept X</x-table.td>
                    <x-table.td>AI-powered deep learning for threat detection,
                        ransomware
                        rollback,
                        exploit prevention,
                        integration
                        with
                        Sophos Central.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>8</x-table.td>
                    <x-table.td>VMware Carbon Black EDR</x-table.td>
                    <x-table.td>Continuous endpoint monitoring, real-time threat
                        intelligence,
                        incident
                        response
                        automation,
                        cloud-native architecture.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>9</x-table.td>
                    <x-table.td>Check Point Harmony Endpoint</x-table.td>
                    <x-table.td>Zero Trust-based endpoint protection, behavioral
                        analysis,
                        AI-powered
                        anti-ransomware
                        detection,
                        threat
                        hunting.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>10</x-table.td>
                    <x-table.td>Cisco Secure Endpoint</x-table.td>
                    <x-table.td>AI-powered threat analytics, automated response,
                        advanced
                        malware
                        protection,
                        integration with Cisco
                        SecureX.</x-table.td>
                </tr>
            </x-table.tbody>
        </x-table.table>
        <h3 class="bg-black font-bold  my-6 p-3 rounded-md text-white secondary-heading">7. Top 10 Takeaways for CISO
        </h3>
        <ol>
            <li>EDR enhances endpoint visibility and real-time threat detection.
            </li>
            <li>AI-driven automation improves incident response efficiency.</li>
            <li>Cloud-native EDR provides better scalability and flexibility.
            </li>
            <li>Integration with SIEM and SOAR optimizes security operations.
            </li>
            <li>Behavioral analytics detect sophisticated attack techniques.
            </li>
            <li>Automated remediation reduces dwell time of threats.</li>
            <li>Zero-trust frameworks enhance endpoint security policies.</li>
            <li>Continuous monitoring is essential for proactive threat hunting.
            </li>
            <li>Compliance mandates necessitate endpoint security measures.</li>
            <li>The future of EDR includes AI-driven predictive threat
                intelligence.</li>
        </ol>
        <h3 class="bg-black font-bold  my-6 p-3 rounded-md text-white secondary-heading">8. Integration with Other
            Cybersecurity
            Products</h3>
        <x-table.table>
            <x-table.thead>
                <tr>
                    <x-table.th label="S.No" />
                    <x-table.th label="Product Name" />
                    <x-table.th label="Related Cybersecurity Products" />
            </x-table.thead>
            <x-table.tbody>
                <tr>
                    <x-table.td>1</x-table.td>
                    <x-table.td>Microsoft Defender for Endpoint</x-table.td>
                    <x-table.td>Microsoft 365 Defender, Microsoft Sentinel,
                        Azure
                        Security
                        Center, SIEM platforms.
                    </x-table.td>
                </tr>
                <tr>
                    <x-table.td>2</x-table.td>
                    <x-table.td>CrowdStrike Falcon</x-table.td>
                    <x-table.td>SIEM (Splunk, QRadar), SOAR platforms, Zero
                        Trust
                        solutions,
                        threat intelligence
                        feeds.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>3</x-table.td>
                    <x-table.td>SentinelOne Singularity</x-table.td>
                    <x-table.td>SIEM (Splunk, QRadar), SOAR platforms, MDR
                        solutions, cloud
                        security platforms.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>4</x-table.td>
                    <x-table.td>Palo Alto Cortex XDR</x-table.td>
                    <x-table.td>Palo Alto Next-Generation Firewall, Prisma
                        Cloud,
                        SIEM
                        solutions, SOAR platforms.
                    </x-table.td>
                </tr>
                <tr>
                    <x-table.td>5</x-table.td>
                    <x-table.td>Trend Micro Apex One</x-table.td>
                    <x-table.td>Trend Micro Vision One, SIEM (Splunk,
                        QRadar),
                        Secure DevOps
                        tools.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>6</x-table.td>
                    <x-table.td>Symantec Endpoint Detection and
                        Response</x-table.td>
                    <x-table.td>Broadcom Security Suite, SIEM (Splunk,
                        QRadar), SOAR
                        integrations.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>7</x-table.td>
                    <x-table.td>Sophos Intercept X</x-table.td>
                    <x-table.td>Sophos Central, SIEM platforms,
                        Next-Generation
                        Firewalls.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>8</x-table.td>
                    <x-table.td>VMware Carbon Black EDR</x-table.td>
                    <x-table.td>SIEM (Splunk, QRadar), SOAR solutions, cloud
                        security platforms.
                    </x-table.td>
                </tr>
                <tr>
                    <x-table.td>9</x-table.td>
                    <x-table.td>Check Point Harmony Endpoint</x-table.td>
                    <x-table.td>Check Point Infinity, SIEM (Splunk, QRadar),
                        Zero
                        Trust security
                        solutions.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>10</x-table.td>
                    <x-table.td>Cisco Secure Endpoint</x-table.td>
                    <x-table.td>Cisco SecureX, SIEM solutions, Secure Web
                        Gateways,
                        Next-Generation Firewalls.</x-table.td>
                </tr>
            </x-table.tbody>
        </x-table.table>
        <h3 class="bg-black font-bold  my-6 p-3 rounded-md text-white secondary-heading">9. Future of EDR (3-5 Years)
        </h3>
        <x-table.table>
            <x-table.thead>
                <tr>
                    <x-table.th label="S.No" />
                    <x-table.th label="Trend" />
                    <x-table.th label="Description" />
            </x-table.thead>
            <x-table.tbody>
                <tr>
                    <x-table.td>1</x-table.td>
                    <x-table.td>AI-Powered Threat
                        Detection</x-table.td>
                    <x-table.td>Enhanced AI models will predict
                        and
                        mitigate endpoint
                        threats before execution.
                    </x-table.td>
                </tr>
                <tr>
                    <x-table.td>2</x-table.td>
                    <x-table.td>Deeper Integration with Zero
                        Trust</x-table.td>
                    <x-table.td>EDR solutions will be tightly
                        integrated
                        into zero-trust
                        security frameworks to
                        prevent lateral
                        movement
                        attacks.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>3</x-table.td>
                    <x-table.td>Behavioral Analytics for Threat
                        Detection</x-table.td>
                    <x-table.td>AI-driven user behavior
                        analytics (UBA)
                        will improve
                        endpoint threat visibility.
                    </x-table.td>
                </tr>
                <tr>
                    <x-table.td>4</x-table.td>
                    <x-table.td>Cloud-Native EDR
                        Solutions</x-table.td>
                    <x-table.td>Increased adoption of
                        cloud-native EDR
                        to provide
                        scalability and rapid
                        response.</x-table.td>
                </tr>
                <tr>
                    <x-table.td>5</x-table.td>
                    <x-table.td>Automated Threat
                        Response</x-table.td>
                    <x-table.td>AI-driven automated response
                        mechanisms
                        will reduce the
                        need for manual
                        intervention.</x-table.td>
                </tr>
            </x-table.tbody>
        </x-table.table>
        <h3 class="bg-black font-bold  my-6 p-3 rounded-md text-white secondary-heading">10. Top 10 Points for
            Zero-Trust Readiness
        </h3>
        <ol>
            <li>AI-driven identity verification for
                endpoint access.</li>
            <li>Continuous monitoring of endpoint
                activities and behaviors.
            </li>
            <li>Integration with Zero Trust Network
                Access (ZTNA) solutions.
            </li>
            <li>Least privilege access enforcement for
                endpoint security.
            </li>
            <li>Multi-Factor Authentication (MFA)
                enforcement for endpoint
                access.</li>
            <li>Adaptive risk-based endpoint security
                policies.</li>
            <li>Continuous user and entity behavior
                analytics (UEBA) for
                endpoint threat detection.
            </li>
            <li>Automated containment and remediation of
                endpoint-based
                threats.</li>
            <li>Secure API-based communication between
                EDR solutions and
                security platforms.</li>
            <li>Encryption enforcement for endpoint data
                in transit and at
                rest.</li>
        </ol>
        <h3 class="bg-black font-bold  my-6 p-3 rounded-md text-white secondary-heading">11. Top 10 Points for
            AI-Readiness</h3>
        <ol>
            <li>AI-powered endpoint threat intelligence
                and anomaly
                detection.</li>
            <li>Machine learning-based behavioral
                analysis of endpoint
                activities.</li>
            <li>Predictive analytics for identifying
                potential
                endpoint-based threats.</li>
            <li>AI-driven automated incident response
                and remediation
                workflows.</li>
            <li>Adaptive machine learning models for
                evolving endpoint
                threat patterns.</li>
            <li>AI-assisted forensic analysis for
                endpoint security
                incidents.</li>
            <li>AI-powered compliance and risk
                assessment automation.</li>
            <li>NLP-based security analysis for
                endpoint-related event
                detection.</li>
            <li>AI-driven proactive remediation of
                endpoint vulnerabilities.
            </li>
            <li>AI-based risk analytics for continuous
                endpoint security
                improvements.</li>
        </ol>
    </div>
@endsection
