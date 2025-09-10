@extends('layouts.process')
@section('title', 'Cryptography')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Cryptography">
                To ensure that access to and integrity of sensitive information is protected and the originator of
                communication or transactions can be confirmed.
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
            <h1>Cryptography</h1>
        </header>
        <article>
            <h3>1. Description of the Cryptography Technologies:</h3>
            <p>Cryptography is the foundation of secure communication in the digital world. It involves the use of
                mathematical
                techniques to protect data from unauthorized access, ensuring confidentiality, integrity, authentication,
                and
                non-repudiation. Cryptographic methods include symmetric encryption, asymmetric encryption, hashing, and
                digital
                signatures. Organizations use cryptographic algorithms such as AES (Advanced Encryption Standard), RSA
                (Rivest-Shamir-Adleman), and SHA (Secure Hash Algorithm) to secure sensitive information, including user
                credentials, financial transactions, and confidential communications. Implementing strong cryptographic
                controls
                is essential for regulatory compliance, data protection, and securing both on-premises and cloud
                environments.
                As cyber threats evolve, cryptographic standards continue to improve, ensuring resilience against attacks
                such
                as brute force, quantum computing, and cryptanalysis.</p>

            <h3>2. Basic Concepts of Cryptography</h3>
            <p>Cryptography is the practice of securing communication and information from unauthorized access by converting
                it
                into an unreadable format. It ensures data confidentiality, integrity, and authenticity by using
                mathematical
                algorithms and cryptographic keys. Modern cryptographic techniques protect sensitive information such as
                financial transactions, passwords, and confidential business communications. Cryptography is widely used in
                applications like secure web browsing (HTTPS), email encryption, and blockchain technology to prevent cyber
                threats like data breaches and eavesdropping.</p>
            <p>There are two main types of cryptography: symmetric encryption and asymmetric encryption. Symmetric
                encryption
                uses the same key for both encryption and decryption, making it fast and efficient. However, securely
                sharing
                the key can be challenging. Examples of symmetric encryption algorithms include AES (Advanced Encryption
                Standard) and DES (Data Encryption Standard). On the other hand, asymmetric encryption uses a pair of keys—a
                public key for encryption and a private key for decryption—enhancing security but requiring more
                computational
                power. Common asymmetric encryption algorithms include RSA (Rivest-Shamir-Adleman) and ECC (Elliptic Curve
                Cryptography).</p>
            <p>In addition to encryption, cryptography also ensures data integrity and authentication using cryptographic
                hash
                functions and digital signatures. Hash functions, such as SHA-256, create a unique fixed-length output for
                any
                given input, ensuring data has not been altered. Digital signatures provide authentication and
                non-repudiation,
                verifying the sender's identity and ensuring that messages are not tampered with. By implementing
                cryptographic
                techniques, organizations can safeguard sensitive data, prevent cyber threats, and comply with security
                regulations like GDPR and PCI DSS.</p>
            <h3>3. Key Performance Indicators (KPIs) in Cryptography</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="KPI Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Frequency" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Encryption Strength</x-table.td>
                        <x-table.td>Measures the robustness of encryption algorithms used in securing data.</x-table.td>
                        <x-table.td>Quarterly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Key Rotation Compliance</x-table.td>
                        <x-table.td>Tracks adherence to scheduled cryptographic key rotations.</x-table.td>
                        <x-table.td>Monthly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Hashing Integrity Checks</x-table.td>
                        <x-table.td>Monitors data integrity by validating cryptographic hash values.</x-table.td>
                        <x-table.td>Weekly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Certificate Expiry Monitoring</x-table.td>
                        <x-table.td>Ensures that SSL/TLS certificates are renewed before expiration.</x-table.td>
                        <x-table.td>Monthly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Quantum-Safe Readiness</x-table.td>
                        <x-table.td>Evaluates cryptographic resilience against emerging quantum threats.</x-table.td>
                        <x-table.td>Annually</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>4. Cryptography Products</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="Product Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Relevant Standard" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>AES Encryption</x-table.td>
                        <x-table.td>Advanced Encryption Standard (AES) ensures high-level data encryption.</x-table.td>
                        <x-table.td>NCA Data Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>RSA Cryptosystem</x-table.td>
                        <x-table.td>Public-key encryption method for secure data exchange.</x-table.td>
                        <x-table.td>NCA Identity & Access Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>SHA-256 Hashing</x-table.td>
                        <x-table.td>Secure hash function for data integrity verification.</x-table.td>
                        <x-table.td>NCA Cybersecurity Defense</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>PKI (Public Key Infrastructure)</x-table.td>
                        <x-table.td>Manages digital certificates and encryption keys.</x-table.td>
                        <x-table.td>NCA Secure Communications</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>HSM (Hardware Security Module)</x-table.td>
                        <x-table.td>Dedicated hardware for secure key management.</x-table.td>
                        <x-table.td>NCA Critical Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Quantum Cryptography</x-table.td>
                        <x-table.td>Next-gen encryption resistant to quantum computing threats.</x-table.td>
                        <x-table.td>NCA Emerging Technologies Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Digital Signatures</x-table.td>
                        <x-table.td>Ensures authentication and non-repudiation of electronic documents.</x-table.td>
                        <x-table.td>NCA Secure Transactions</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>SSL/TLS Encryption</x-table.td>
                        <x-table.td>Secures web communications using strong cryptographic protocols.</x-table.td>
                        <x-table.td>NCA Network Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Zero Trust Encryption</x-table.td>
                        <x-table.td>Applies continuous encryption for Zero Trust security frameworks.</x-table.td>
                        <x-table.td>NCA Zero Trust Architecture</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>End-to-End Encryption (E2EE)</x-table.td>
                        <x-table.td>Protects data from sender to recipient without third-party access.</x-table.td>
                        <x-table.td>NCA Secure Messaging</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>5. Summary</h3>
            <p>Cryptography plays a critical role in securing digital communications, ensuring data confidentiality, and
                safeguarding sensitive information from cyber threats. As technology evolves, organizations must adopt
                advanced
                cryptographic techniques to stay ahead of emerging risks, including quantum computing threats. A
                well-implemented cryptographic framework enhances security, strengthens regulatory compliance, and provides
                a
                robust defense against cyberattacks. By leveraging strong encryption, secure key management, and digital
                signature technologies, businesses can protect their assets and maintain trust in an increasingly
                interconnected
                digital world.</p>
        </article>
    </div>
@endsection
