 <div id="ParmanentAddress" class="tabcontent">
     <div class="row">
         <div class="col-md-12">
             <table class="table no-border">
                 <tr>
                     <td>Country</td>
                     <td> <span>:</span>
                         @isset($student->country)
                             {{ $student->country }}
                         @endisset
                     </td>
                 </tr>

                 <tr>
                     <td>Division</td>
                     <td> <span>:</span>
                         @isset($student->state)
                             {{ $student->state }}
                         @endisset
                     </td>
                 </tr>

                 <tr>
                     <td>District</td>
                     <td> <span>:</span>
                         ---
                     </td>
                 </tr>

                 <tr>
                     <td>Upozilla/ P.S</td>
                     <td> <span>:</span>
                         ---
                     </td>
                 </tr>

                 <tr>
                     <td>Post Office</td>
                     <td> <span>:</span>
                         ---
                     </td>
                 </tr>


                 <tr>
                     <td>Village</td>
                     <td> <span>:</span>
                         ---
                     </td>
                 </tr>

                 <tr>
                     <td>Road No</td>
                     <td> <span>:</span>
                         ---
                     </td>
                 </tr>

                 <tr>
                     <td>House No</td>
                     <td> <span>:</span>
                         @isset($student->address)
                             {{ $student->address }}
                         @endisset
                     </td>
                 </tr>
             </table>
         </div>
     </div>
 </div>
