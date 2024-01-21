 <div id="MedicalInformation" class="tabcontent">
     <div class="row">
         <div class="col-md-12">
             <table class="table no-border">
                 <tr>
                     <td>Height</td>
                     <td> <span>:</span>
                         ---
                     </td>
                 </tr>

                 <tr>
                     <td>Weight</td>
                     <td> <span>:</span>
                         ---
                     </td>
                 </tr>

                 <tr>
                     <td>Blood Group</td>
                     <td> <span>:</span>
                         @isset($student->blood_group)
                             {{ $student->blood_group }}
                         @endisset
                     </td>
                 </tr>

                 <tr>
                     <td>Special Disease</td>
                     <td> <span>:</span>
                         ---
                     </td>
                 </tr>
             </table>
         </div>
     </div>
 </div>
