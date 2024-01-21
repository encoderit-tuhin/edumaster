 <div class="row">
     <div class="col-lg-1 d-flex align-items-stretch">
         <div class="profile-image border-end">
             <img src="{{ asset('uploads/images/' . $student->image) }}" class="img-fluid h-100" alt="image">
         </div>
     </div>
     <div class="col-lg-11">
         <table class="table table-bordered mt-4">
             <thead class="bg-white">
                 <tr>
                     <th scope="col"><span>Class</span></th>
                     <th scope="col"><span>Shift</span></th>
                     <th scope="col"><span>Section</span></th>
                     <th scope="col"><span>Roll No.</span></th>
                     <th scope="col"><span>Group</span></th>
                     <th scope="col"><span>Academic Year</span></th>
                 </tr>
             </thead>
             <tbody>
                 <tr>
                     <td>{{ $student->class_name }}</td>
                     <td>---</td>
                     <td>{{ $student->section_name }}</td>
                     <td>{{ $student->roll }}</td>
                     <td>{{ $student->group_name }}</td>
                     <td>
                         ---
                     </td>
                 </tr>
             </tbody>
         </table>
     </div>
 </div>

 <div class="separator"
     style="border-bottom: 1px solid #f1f1f1; border-bottom-style: double; border-width: 5px; margin: 30px 0;">
 </div>
