  <style>
      .tab {
          float: left;
          border: 1px solid #ccc;
          background-color: #dfe8eb;
          width: 15%;
          height: 350px;
          border-radius: 10px 0 0 10px;
          padding: 10px 0;
      }

      .tab button {
          display: block;
          background-color: inherit;
          color: black;
          /* padding: 22px 16px; */
          width: 91%;
          border: none;
          outline: none;
          text-align: left;
          cursor: pointer;
          transition: 0.3s;
          font-size: 18px;
          margin: 5%;
          border-radius: 4px;
          padding: 5px 5px;
          margin: 10px 5px;
      }

      .tab button:hover {
          background-color: #bee9f7;
      }

      .tab button.active {
          background-color: #6398a8;
      }

      .tabcontent {
          float: left;
          padding: 0px 12px;
          border: 1px solid #ccc;
          width: 80%;
          border-left: none;
          height: 400px;
          border-radius: 0 10px 10px 0;
      }
  </style>

  <div class="panel panel-default">
      <div class="panel-body">
          @include('backend.students.student_reports.quick_search.partials.student_info')

          <div class="row">
              <div class="col-lg-12">
                  <div class="tab">
                      <button class="tablinks" onclick="openTab(event, 'BASICINFOMATION')" id="defaultOpen">Basic
                          Information</button>
                      <button class="tablinks" onclick="openTab(event, 'ParmanentAddress')">Parmanent Address</button>
                      <button class="tablinks" onclick="openTab(event, 'GuardianInformation')">Guardian
                          Information</button>
                      <button class="tablinks" onclick="openTab(event, 'MedicalInformation')">Medical
                          Information</button>
                      <button class="tablinks" onclick="openTab(event, 'Addmission')">Addmission</button>
                      <button class="tablinks" onclick="openTab(event, 'PreviousInstitution')">Previous
                          Institution</button>
                      <button class="tablinks" onclick="openTab(event, 'PreviousExam')">Previous Exam</button>
                  </div>

                  @include('backend.students.student_reports.quick_search.partials.profile_partials.basic_information')
                  @include('backend.students.student_reports.quick_search.partials.profile_partials.parmanent_address')
                  @include('backend.students.student_reports.quick_search.partials.profile_partials.guardian_information')
                  @include('backend.students.student_reports.quick_search.partials.profile_partials.medical_information')
                  @include('backend.students.student_reports.quick_search.partials.profile_partials.addmission')
                  @include('backend.students.student_reports.quick_search.partials.profile_partials.previous_institution')
                  @include('backend.students.student_reports.quick_search.partials.profile_partials.previous_exam')
              </div>
          </div>
      </div>
  </div>
