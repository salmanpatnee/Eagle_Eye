@extends('layouts.pitstop')
@section('title', 'Electronic Banking Services')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Electronic Banking Services">
                To ensure the Member Organization safeguards the confidentiality and integrity of the customer
                information and transactions.
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
            <h1>Electronic Banking Services</h1>
        </header>
        <article>
            <h3>1. Description of the Cybersecurity Governance Technologies:</h3>
            <p>Electronic Banking Services (EBS) enable customers to conduct financial transactions through digital
                platforms,
                eliminating the need for physical bank visits. These services include internet banking, mobile banking,
                ATMs,
                point-of-sale (POS) transactions, and electronic fund transfers (EFT). They offer customers 24/7 access to
                their
                accounts,
                allowing them to manage their finances conveniently and securely.</p>
            <p>Security is a top priority in electronic banking, with banks implementing strong encryption, multi-factor
                authentication,
                and fraud detection systems to protect transactions. Additionally, banks integrate compliance standards to
                ensure secure
                and seamless banking operations. As financial technology advances, banks continue to enhance their digital
                services by
                offering faster transaction processing, biometric authentication, and AI-driven fraud prevention.</p>

            <h3>2. Basic Concepts of Electronic Banking Services</h3>
            <p>Electronic banking services, also known as e-banking or online banking, provide customers with convenient,
                digital access to financial transactions and services. These services include online fund transfers, bill
                payments, mobile banking, ATM transactions, and digital wallets. E-banking has revolutionized traditional
                banking by allowing customers to perform transactions anytime, anywhere, without visiting a physical branch.
                This not only enhances customer experience but also reduces operational costs for financial institutions.
            </p>
            <p>Security is a critical aspect of electronic banking services due to the risk of cyber threats such as
                phishing,
                identity theft, and fraud. To protect customer data and transactions, banks implement strong authentication
                mechanisms like two-factor authentication (2FA), encryption, and biometric verification. Compliance with
                cybersecurity regulations such as the Payment Card Industry Data Security Standard (PCI DSS) and ISO 27001
                ensures that banks follow best practices in securing electronic transactions. Additionally, fraud detection
                and
                monitoring systems help identify suspicious activities in real time, preventing unauthorized access.</p>
            <p>As technology advances, electronic banking services continue to evolve with innovations such as AI-driven
                chatbots, blockchain-based payments, and open banking frameworks. The integration of fintech solutions with
                traditional banking allows for more personalized financial services, making banking faster and more
                efficient.
                With increasing reliance on digital platforms, banks must continually invest in cybersecurity measures,
                customer
                education, and regulatory compliance to maintain trust and security in electronic banking services.</p>
            <h3>3. Key Performance Indicators (KPIs) in Electronic Banking Services</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="KPI Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Frequency" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Transaction Success Rate</x-table.td>
                        <x-table.td>Measures the percentage of successful electronic transactions.</x-table.td>
                        <x-table.td>Daily</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>System Uptime Percentage</x-table.td>
                        <x-table.td>Tracks the availability of electronic banking services.</x-table.td>
                        <x-table.td>Monthly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Customer Satisfaction Score</x-table.td>
                        <x-table.td>Evaluates customer experience with online and mobile banking.</x-table.td>
                        <x-table.td>Quarterly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Fraud Detection Rate</x-table.td>
                        <x-table.td>Monitors the effectiveness of fraud prevention mechanisms.</x-table.td>
                        <x-table.td>Weekly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Average Transaction Speed</x-table.td>
                        <x-table.td>Measures the time taken to complete an online banking transaction.</x-table.td>
                        <x-table.td>Daily</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>4. Electronic Banking Services Products</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="Product Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Relevant Standard" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Online Banking Platforms</x-table.td>
                        <x-table.td>Secure web-based portals for account access, fund transfers, and bill
                            payments.</x-table.td>
                        <x-table.td>NCA Cybersecurity Governance</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Mobile Banking Apps</x-table.td>
                        <x-table.td>Smartphone applications providing banking services on the go.</x-table.td>
                        <x-table.td>NCA Mobile Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Automated Teller Machines (ATMs)</x-table.td>
                        <x-table.td>Self-service machines for cash withdrawals, deposits, and balance
                            inquiries.</x-table.td>
                        <x-table.td>NCA Physical Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Electronic Fund Transfers (EFT)</x-table.td>
                        <x-table.td>Digital transfer of funds between bank accounts.</x-table.td>
                        <x-table.td>NCA Data Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Point-of-Sale (POS) Systems</x-table.td>
                        <x-table.td>Electronic terminals for card-based transactions in retail locations.</x-table.td>
                        <x-table.td>NCA Payment Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Secure Payment Gateways</x-table.td>
                        <x-table.td>Online platforms that process digital payments securely.</x-table.td>
                        <x-table.td>NCA Cybersecurity Monitoring</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Biometric Authentication Solutions</x-table.td>
                        <x-table.td>Uses fingerprint, facial recognition, or iris scanning for secure banking.</x-table.td>
                        <x-table.td>NCA Identity & Access Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>AI-based Fraud Detection</x-table.td>
                        <x-table.td>Machine learning systems that identify and prevent fraudulent transactions.</x-table.td>
                        <x-table.td>NCA Threat Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Digital Wallets</x-table.td>
                        <x-table.td>Secure virtual wallets for contactless payments and fund storage.</x-table.td>
                        <x-table.td>NCA Cloud Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Blockchain Payment Solutions</x-table.td>
                        <x-table.td>Decentralized and secure payment processing using blockchain technology.</x-table.td>
                        <x-table.td>NCA Compliance Management</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>4. Summary</h3>
            <p>
                Electronic Banking Services have revolutionized the financial industry by providing secure, convenient, and
                efficient ways to conduct transactions.
                With continuous advancements in technology, banks are improving their digital offerings, focusing on
                security,
                fraud prevention, and seamless user experience.
                By implementing best practices and adhering to cybersecurity standards, financial institutions can enhance
                trust
                and reliability in electronic banking.
            </p>
        </article>
    </div>
@endsection
