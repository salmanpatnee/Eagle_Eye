@extends('layouts.app-full')
@section('title', 'Evidences and Frameworks')
@section('title_ar', 'الأدلة والأطر')
@section('content')
    <div>
        <x-table.action-wrapper title="Evidences and Frameworks">
        </x-table.action-wrapper>



        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Mandatory Regulatory Evidences and Frameworks"
                    label_ar="الأدلة والأطر التنظيمية الإلزامية" />
                <x-table.th label="Reference" label_ar="مرجع" />
                <x-table.th label="Attachment" label_ar="المرفقات" />
                <x-table.th label="Status" label_ar="حالة" />

            </x-table.thead>
            <x-table.tbody>

                <tr>
                    <x-table.td>01</x-table.td>
                    <x-table.td>Cybersecurity Strategy</x-table.td>
                    <x-table.td>NCA-ECC-1-1, NCA-CSCC-1-1</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="strategyframework">
                            <a href="#">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>02</x-table.td>
                    <x-table.td>Cybersecurity Management and Committee Charter</x-table.td>
                    <x-table.td>NCA-ECC-1-2</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="charterframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>03</x-table.td>
                    <x-table.td>Roles and Responsibilities Framework</x-table.td>
                    <x-table.td>NCA-ECC-1-4, NCA-CCC-1-1</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="rolesframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>04</x-table.td>
                    <x-table.td>Risk Management Framework</x-table.td>
                    <x-table.td>NCA-ECC-1-5, NCA-CSCC-1-2</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="riskframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>05</x-table.td>
                    <x-table.td>Project Management Framework</x-table.td>
                    <x-table.td>NCA-ECC-1-6</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="projectframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>06</x-table.td>
                    <x-table.td>Compliance Management Framework</x-table.td>
                    <x-table.td>NCA-ECC-1-7, NCA-CCC-1-3</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="complianceframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>07</x-table.td>
                    <x-table.td>Review and Audit Management Framework</x-table.td>
                    <x-table.td>NCA-ECC-1-8, NCA-CSCC-1-4</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="reviewframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>08</x-table.td>
                    <x-table.td>Human Resource Framework</x-table.td>
                    <x-table.td>NCA-ECC-1-9</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="humanframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>09</x-table.td>
                    <x-table.td>Cybersecurity Awareness and Training Framework</x-table.td>
                    <x-table.td>NCA-ECC-1-10</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="awarenessframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>10</x-table.td>
                    <x-table.td>Asset Management Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-1</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="assetframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>11</x-table.td>
                    <x-table.td>Identity and Access Management</x-table.td>
                    <x-table.td>NCA-ECC-2-2</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="identityframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>12</x-table.td>
                    <x-table.td>Anti-Malware Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-3-3-1</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="antimalwareframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>13</x-table.td>
                    <x-table.td>Clock Synchronization Guidelines</x-table.td>
                    <x-table.td>NCA-ECC-2-3-3-4</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="clockframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>14</x-table.td>
                    <x-table.td>Data Center Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-3</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="dataframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>15</x-table.td>
                    <x-table.td>Patch Management Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-3</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="patchframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>16</x-table.td>
                    <x-table.td>Storage Management Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-3</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="storageframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>17</x-table.td>
                    <x-table.td>Email Protection Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-4</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="emailframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>18</x-table.td>
                    <x-table.td>Network Security Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-5</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="networkframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>19</x-table.td>
                    <x-table.td>Mobile Device Management Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-6</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="mobileframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>20</x-table.td>
                    <x-table.td>Data and Information Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-7</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="dataandinformationframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>21</x-table.td>
                    <x-table.td>Cryptography Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-8</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="cryptographyframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>22</x-table.td>
                    <x-table.td>Backup & Recovery Management Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-9</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="backupframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>23</x-table.td>
                    <x-table.td>Vulnerability Management Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-10</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="vulnerabilityframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>24</x-table.td>
                    <x-table.td>Pen Test Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-11</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="pentestframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>25</x-table.td>
                    <x-table.td>Event Log and Monitoring Management Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-12</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="eventframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>26</x-table.td>
                    <x-table.td>Incident and Threat Managment Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-13</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="incidentframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>27</x-table.td>
                    <x-table.td>Physical Security Framework</x-table.td>
                    <x-table.td>NCA-ECC-2-14</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="physicalframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>28</x-table.td>
                    <x-table.td>Application, System Development</x-table.td>
                    <x-table.td>NCA-ECC-2-15</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="applicationframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>29</x-table.td>
                    <x-table.td>Business Continuity Framework</x-table.td>
                    <x-table.td>NCA-ECC-3-1</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="businessframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>30</x-table.td>
                    <x-table.td>Third Party Framework</x-table.td>
                    <x-table.td>NCA-ECC-4-1</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="thirdpartyframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>31</x-table.td>
                    <x-table.td>Cloud Deployment Framework</x-table.td>
                    <x-table.td>NCA-ECC-4-2</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="cloudframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>32</x-table.td>
                    <x-table.td>Change Management Framework</x-table.td>
                    <x-table.td>NCA-CCC-1-5</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="changeframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>33</x-table.td>
                    <x-table.td>Capacity Management Framework</x-table.td>
                    <x-table.td>NCA-CSCC-1-3</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="capacityframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>34</x-table.td>
                    <x-table.td>Configuration Management Framework</x-table.td>
                    <x-table.td>NCA-DCC-2-7</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="configurationframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>
                <tr>
                    <x-table.td>35</x-table.td>
                    <x-table.td>Telework Management Framework</x-table.td>
                    <x-table.td>NCA-TCC-1-1</x-table.td>
                    <x-table.td>
                        <div class="attachment" id="teleworkframework">
                            <a href="">
                                <p>View Attachment</p>
                            </a>
                        </div>
                    </x-table.td>
                    <x-table.td>Linked</x-table.td>
                </tr>

            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
