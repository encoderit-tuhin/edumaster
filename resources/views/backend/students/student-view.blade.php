@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Student Profile') }}
                    </div>
                </div>

                <table class="table table-striped table-bordered" width="100%">
                    <tbody>
                        <tr>
                            @isset($studentSession->student->user->image)
                                <td style="text-align: center;" colspan="4">
                                    <img width="200px" style="border-radius: 7px;"
                                        src="{{ asset('uploads/images/' . $studentSession->student->user->image) }}">
                                </td>
                            @endisset
                        </tr>
                        <tr>
                            <td colspan="2">{{ _lang('Name') }}</td>
                            <td colspan="2">
                                @isset($studentSession->student->first_name)
                                    {{ $studentSession->student->first_name . ' ' . ($studentSession->student->last_name ?? '') }}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td>{{ _lang('Guardian') }}</td>
                            <td>
                                @isset($studentSession->student->parent->parent_name)
                                    {{ $studentSession->student->parent->parent_name }}
                                @endisset
                            </td>
                            <td>{{ _lang('Date Of Birth') }}</td>
                            <td>
                                @isset($studentSession->student->birthday)
                                    {{ $studentSession->student->birthday }}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td>{{ _lang('Gender') }}</td>
                            <td>
                                @isset($studentSession->student->gender)
                                    {{ $studentSession->student->gender }}
                                @endisset
                            </td>
                            <td>{{ _lang('Blood Group') }}</td>
                            <td>
                                @isset($studentSession->student->blood_group)
                                    {{ $studentSession->student->blood_group }}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td>{{ _lang('Religion') }}</td>
                            <td>
                                @isset($studentSession->student->religion)
                                    {{ $studentSession->student->religion }}
                                @endisset
                            </td>

                            <td>Address</td>
                            <td>
                                @isset($studentSession->student->address)
                                    {{ $studentSession->student->address }}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td>{{ _lang('Phone') }}</td>
                            <td>
                                @isset($studentSession->student->phone)
                                    {{ $studentSession->student->phone }}
                                @endisset
                            </td>
                            <td>{{ _lang('Email') }}</td>
                            <td> @isset($studentSession->student->user->email)
                                    {{ $studentSession->student->user->email }}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td>{{ _lang('State') }}</td>
                            <td>
                                @isset($studentSession->student->state)
                                    {{ $studentSession->student->state }}
                                @endisset
                            </td>
                            <td>{{ _lang('Country') }}</td>
                            <td>
                                @isset($studentSession->student->country)
                                    {{ $studentSession->student->country }}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td>{{ _lang('Class') }}</td>
                            <td>
                                @isset($studentSession->class->class_name)
                                    {{ $studentSession->class->class_name }}
                                @endisset
                            </td>
                            <td>{{ _lang('Section') }}</td>
                            <td>
                                @isset($studentSession->section->section_name)
                                    {{ $studentSession->section->section_name }}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td>{{ _lang('Register No') }}</td>
                            <td>
                                @isset($studentSession->student->register_no)
                                    {{ $studentSession->student->register_no }}
                                @endisset
                            </td>
                            <td>{{ _lang('Roll') }}</td>
                            <td>
                                @isset($studentSession->roll)
                                    {{ $studentSession->roll }}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td>{{ _lang('Group') }}</td>
                            <td>
                                @isset($studentSession->student->group)
                                    {{ $studentSession->student->group }}
                                @endisset
                            </td>
                            <td>{{ _lang('Optional Subject') }}</td>
                            <td>
                                @isset($studentSession->student->optional_subject)
                                    {{ $studentSession->student->optional_subject }}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td>{{ _lang('Activities') }}</td>
                            <td>
                                @isset($studentSession->student->activities)
                                    {{ $studentSession->student->activities }}
                                @endisset
                            </td>
                            <td>{{ _lang('Remarks') }}</td>
                            <td>
                                @isset($studentSession->student->remarks)
                                    {{ $studentSession->student->remarks }}
                                @endisset
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
