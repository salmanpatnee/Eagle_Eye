@extends('layouts.process')
@section('title', 'Physical Security')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Physical Security">
                To prevent unauthorized physical access to the Member Organization information assets and to ensure
                its protection.
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
            <h1>Physical Security</h1>
        </header>
        <article>
            <h3>1. Description of Physical Security Technologies:</h3>
            <p>Physical security technologies are essential in protecting an organization’s critical IT infrastructure, data
                centers, and sensitive areas from unauthorized access, environmental hazards, and physical threats. These
                technologies include Access Control Systems (ACS), which use biometric authentication, RFID cards, and
                keypads
                to restrict entry to authorized personnel. Surveillance Systems (CCTV) continuously monitor
                security-sensitive
                areas to detect unauthorized activities. Intrusion Detection Systems (IDS) alert security teams about
                unauthorized access attempts. Environmental Monitoring Systems track temperature, humidity, and fire hazards
                in
                data centers to prevent physical damage to critical infrastructure. Smart Locks and Security Barriers
                reinforce
                physical protection by restricting entry to critical areas. Additionally, Visitor Management Systems (VMS)
                ensure that only authorized guests gain access to restricted zones. Asset Tracking Technologies, such as
                RFID
                and GPS tagging, help organizations monitor the location and movement of physical IT assets. Integrating
                these
                technologies into an NCA-compliant cybersecurity framework enhances security, prevents unauthorized access,
                and
                mitigates physical risks to IT assets.</p>

            <h3>2. Basic Concepts of Physical Security</h3>
            <p>Physical security is an essential component of an organization’s overall cybersecurity strategy. While
                digital
                threats like hacking and malware are significant risks, unauthorized physical access to devices, servers,
                and
                sensitive areas can be just as dangerous. Organizations must implement strong physical security measures to
                protect assets from theft, tampering, and other threats.</p>
            <p>One of the key aspects of physical security is access control. Organizations should use keycards, biometric
                authentication, and security guards to limit access to sensitive areas like server rooms and data centers.
                Employees should only be granted access to areas relevant to their roles, following the principle of least
                privilege. Surveillance cameras and motion sensors should also be installed to monitor and record activity,
                acting as both a deterrent and an investigative tool in case of security incidents.</p>
            <p>Another critical element is device security. Laptops, USB drives, and other porx-table.table devices can be
                easily
                stolen
                if left unattended. Organizations should implement policies requiring employees to lock their screens when
                stepping away and use cable locks for office computers. In high-security environments, faraday cages or
                secure
                storage lockers may be necessary to prevent unauthorized wireless communication.</p>
            <p>Additionally, organizations must establish disaster recovery plans for fire, flooding, and other physical
                threats. Data centers should have fire suppression systems, temperature control, and backup power sources to
                ensure continuous operation. Employees should also be trained on security best practices, including
                reporting
                suspicious activities and following evacuation protocols during emergencies.</p>
            <p>By integrating physical security with cybersecurity measures, organizations can prevent unauthorized access,
                protect critical infrastructure, and ensure business continuity in the face of physical threats.</p>

            <h3>3. Key Performance Indicators (KPIs) in Physical Security</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="KPI Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Frequency" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Unauthorized Access Attempts</x-table.td>
                        <x-table.td>Measures the number of failed access attempts at restricted areas.</x-table.td>
                        <x-table.td>Monthly (NCA Physical Security)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>CCTV Coverage Efficiency</x-table.td>
                        <x-table.td>Percentage of security-critical areas monitored by surveillance cameras.</x-table.td>
                        <x-table.td>Quarterly (NCA Security)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Incident Response Time</x-table.td>
                        <x-table.td>Tracks the average response time to physical security breaches.</x-table.td>
                        <x-table.td>Bi-Annually (NCA Incident Mgmt)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Environmental Monitoring Compliance</x-table.td>
                        <x-table.td>Evaluates adherence to environmental safety standards in IT facilities.</x-table.td>
                        <x-table.td>Annually (NCA Data Center Security)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Physical Asset Security Compliance</x-table.td>
                        <x-table.td>Measures compliance with physical security policies for IT equipment.</x-table.td>
                        <x-table.td>Quarterly (NCA Asset Protection)</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>4. Physical Security Products</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="Product Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Relevant Standard" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Access Control Systems (ACS)</x-table.td>
                        <x-table.td>Restricts entry using biometric authentication, RFID, or keypads.</x-table.td>
                        <x-table.td>NCA Physical Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>CCTV Surveillance Systems</x-table.td>
                        <x-table.td>Provides continuous monitoring and video recording of secure areas.</x-table.td>
                        <x-table.td>NCA Cybersecurity Monitoring</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Intrusion Detection Systems (IDS)</x-table.td>
                        <x-table.td>Alerts security teams on unauthorized access attempts.</x-table.td>
                        <x-table.td>NCA Threat Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Environmental Monitoring Systems</x-table.td>
                        <x-table.td>Detects temperature, humidity, and environmental hazards.</x-table.td>
                        <x-table.td>NCA Data Center Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Visitor Management Systems (VMS)</x-table.td>
                        <x-table.td>Manages guest access to restricted areas.</x-table.td>
                        <x-table.td>NCA Facility Access Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Smart Locks & Security Barriers</x-table.td>
                        <x-table.td>Reinforces access control through automated locking mechanisms.</x-table.td>
                        <x-table.td>NCA Physical Access Control</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Asset Tracking & RFID Solutions</x-table.td>
                        <x-table.td>Monitors physical movement of IT assets.</x-table.td>
                        <x-table.td>NCA Asset Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Physical Security Information Management Systems (PSIM)</x-table.td>
                        <x-table.td>Integrates security technologies for centralized monitoring.</x-table.td>
                        <x-table.td>NCA Security Operations</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Secure Facility Alarm Systems</x-table.td>
                        <x-table.td>Alerts security teams on physical security threats.</x-table.td>
                        <x-table.td>NCA Emergency Response</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Emergency Response & Fire Suppression Systems</x-table.td>
                        <x-table.td>Protects IT infrastructure from fire hazards and emergencies.</x-table.td>
                        <x-table.td>NCA Safety & Compliance</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>5. Summary</h3>
            <p>Physical security is a critical component of an organization’s cybersecurity strategy, ensuring the
                protection of
                IT assets, data centers, and restricted areas from unauthorized access and environmental threats.
                Organizations
                must implement Access Control Systems, CCTV surveillance, intrusion detection, and environmental monitoring
                tools to ensure compliance with NCA Physical Security Standards. Key performance indicators (KPIs) such as
                unauthorized access attempts, CCTV coverage efficiency, and incident response times help organizations
                assess
                and improve their physical security measures. By integrating advanced physical security technologies with
                cybersecurity frameworks, organizations can prevent security breaches, enhance asset protection, and
                strengthen
                resilience against physical threats.</p>
        </article>
    </div>
@endsection
