@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Employee</h2>
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="employee-card">
            <div class="card-col left">
                <div class="form-group">
                    <label for="photo"></label>
                    <input type="file" name="photo" id="photo" class="file-loading form-control">
                </div>
            </div>

            <div class="card-col right">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="your@email.com" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="join_date">Hire Date</label>
                    <input type="text" name="join_date" id="join_date" class="form-control date-input" placeholder="12/31/2024" value="{{ old('join_date') }}">
                </div>
                
                <div class="form-group">
                    <label for="department">Department</label>
                    <select name="department" id="department" class="form-control">
                        @if (strlen(old('department')) > 0)
                            <option value="{{ old('department') }}">{{ old('department') }}</option>
                        @endif
                        <option value="" disabled selected>Select Department</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Business Development">Business Development</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="Legal">Legal</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Product Management">Product Management</option>
                        <option value="Research and Development">Research and Development</option>
                        <option value="Sales">Sales</option>
                        <option value="Services">Services</option>
                        <option value="Support">Support</option>
                        <option value="Training">Training</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="position">Position</label>
                    <select name="position" id="position" class="form-control">
                        <optgroup label="Accounting">
                            <option value="Accountant">Accountant</option>
                            <option value="Bookkeeper">Bookkeeper</option>
                            <option value="Accounting Manager">Accounting Manager</option>
                            <option value="Internal Auditor">Internal Auditor</option>
                            <option value="Financial Analyst">Financial Analyst</option>
                        </optgroup>

                        <optgroup label="Business Development">
                            <option value="Business Development Manager">Business Development Manager</option>
                            <option value="Strategic Partnerships Specialist">Strategic Partnerships Specialist</option>
                            <option value="Business Development Analyst">Business Development Analyst</option>
                            <option value="Account Manager">Account Manager</option>
                            <option value="Sales Executive">Sales Executive</option>
                        </optgroup>

                        <optgroup label="Engineering">
                            <option value="Software Engineer">Software Engineer</option>
                            <option value="Network Engineer">Network Engineer</option>
                            <option value="Systems Engineer">Systems Engineer</option>
                            <option value="Mechanical Engineer">Mechanical Engineer</option>
                            <option value="Project Engineering Manager">Project Engineering Manager</option>
                        </optgroup>
                            
                        <optgroup label="Human Resources">
                            <option value="Human Resources Manager">Human Resources Manager</option>
                            <option value="Recruitment Specialist">Recruitment Specialist</option>
                            <option value="HR Consultant">HR Consultant</option>
                            <option value="Organizational Development Analyst">Organizational Development Analyst</option>
                            <option value="Employee Trainer">Employee Trainer</option>
                        </optgroup>
                            
                        <optgroup label="Legal">
                            <option value="Corporate Lawyer">Corporate Lawyer</option>
                            <option value="Legal Assistant">Legal Assistant</option>
                            <option value="Compliance Manager">Compliance Manager</option>
                            <option value="Legal Consultant">Legal Consultant</option>
                            <option value="Paralegal">Paralegal</option>
                        </optgroup>
                            
                        <optgroup label="Marketing">
                            <option value="Marketing Manager">Marketing Manager</option>
                            <option value="Social Media Specialist">Social Media Specialist</option>
                            <option value="Marketing Analyst">Marketing Analyst</option>
                            <option value="Graphic Designer">Graphic Designer</option>
                            <option value="Content Manager">Content Manager</option>
                        </optgroup>
                            
                        <optgroup label="Product Management">
                            <option value="Product Manager">Product Manager</option>
                            <option value="Product Analyst">Product Analyst</option>
                            <option value="Product Marketing Specialist">Product Marketing Specialist</option>
                            <option value="Product Project Manager">Product Project Manager</option>
                            <option value="UX/UI Designer">UX/UI Designer</option>
                        </optgroup>
                            
                        <optgroup label="Research and Development">
                            <option value="Research Scientist">Research Scientist</option>
                            <option value="R&D Engineer">R&D Engineer</option>
                            <option value="R&D Manager">R&D Manager</option>
                            <option value="Data Analyst">Data Analyst</option>
                            <option value="Product Technologist">Product Technologist</option>
                        </optgroup>
                            
                        <optgroup label="Sales">
                            <option value="Sales Manager">Sales Manager</option>
                            <option value="Sales Executive">Sales Executive</option>
                            <option value="Business Development Specialist">Business Development Specialist</option>
                            <option value="Sales Coordinator">Sales Coordinator</option>
                            <option value="Key Account Manager">Key Account Manager</option>
                        </optgroup>
                            
                        <optgroup label="Services">
                            <option value="Customer Service Manager">Customer Service Manager</option>
                            <option value="Customer Support Specialist">Customer Support Specialist</option>
                            <option value="Service Coordinator">Service Coordinator</option>
                            <option value="Service Technician">Service Technician</option>
                            <option value="Operations Manager - Services">Operations Manager - Services</option>
                        </optgroup>
                            
                        <optgroup label="Support">
                            <option value="IT Support Technician">IT Support Technician</option>
                            <option value="Customer Support Analyst">Customer Support Analyst</option>
                            <option value="Customer Service Specialist">Customer Service Specialist</option>
                            <option value="Technical Support Manager">Technical Support Manager</option>
                            <option value="Support Coordinator">Support Coordinator</option>
                        </optgroup>
                            
                        <optgroup label="Training">
                            <option value="Corporate Trainer">Corporate Trainer</option>
                            <option value="Employee Development Specialist">Employee Development Specialist</option>
                            <option value="Training Manager">Training Manager</option>
                            <option value="Training Coordinator">Training Coordinator</option>
                            <option value="Training Facilitator">Training Facilitator</option>
                        </optgroup>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>

    <script>
        $('input[type="file"]').fileinput({
            'showUpload':false,
            'previewFileType':'image',
            'maxFileSize': 2048,
        });
    </script>
</div>
@endsection
