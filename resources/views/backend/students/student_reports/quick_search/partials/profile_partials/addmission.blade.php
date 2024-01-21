 <div id="Addmission" class="tabcontent">
     <div class="row">
         <div class="col-md-12">
             <table class="table no-border">
                 <tr>
                     <td>Category</td>
                     <td> <span>:</span>
                         @isset($student->student_category_id)
                             {{ $student->student_category_id }}
                         @endisset
                     </td>
                 </tr>

                 <tr>
                     <td>Date</td>
                     <td> <span>:</span>
                         ---
                     </td>
                 </tr>

                 <tr>
                     <td>Year</td>
                     <td> <span>:</span>
                         ---
                     </td>
                 </tr>

                 <tr>
                     <td> Date of Birth</td>
                     <td> <span>:</span>
                         @isset($student->birthday)
                             {{ $student->birthday }}
                         @endisset
                     </td>
                 </tr>

                 <tr>
                     <td>TC No</td>
                     <td> <span>:</span>
                         ---
                     </td>
                 </tr>

                 <tr>
                     <td>Nationality</td>
                     <td> <span>:</span>
                         Bangladeshi
                     </td>
                 </tr>

             </table>
         </div>
     </div>
 </div>
