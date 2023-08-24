@extends('admin.layouts.app')

@section('body')
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                @include('admin.includes.breadcrumb-v2')
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
                {{-- <a class="btn btn-primary" href="{{ route('permissions.create') }}"><i class="fa fa-plus"></i> Add New</a> --}}
            </div>
        </div>
    </div>

    <div class="" style="padding-top: 170px;">
        <div class="chat-main-row">
            <div class="chat-main-wrapper">
                <div class="col-lg-7 message-view task-view task-left-sidebar">
                    <div class="chat-window">
                        <div class="fixed-header">
                            <div class="navbar">
                                <div class="float-start me-auto">
                                    <div class="add-task-btn-wrapper">
                                        <span class="add-task-btn btn btn-white btn-sm">
                                            Add Task
                                        </span>
                                    </div>
                                </div>
                                <a class="task-chat profile-rightbar float-end" id="task_chat" href="#task_window"><i
                                        class="fa fa fa-comment"></i></a>
                                <ul class="nav float-end custom-menu">
                                    <li class="nav-item dropdown dropdown-action">
                                        <a href="" class="dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false"><i class="fa-solid fa-gear"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end custom-dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)">Pending Tasks</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Completed Tasks</a>
                                            <a class="dropdown-item" href="javascript:void(0)">All Tasks</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="chat-contents">
                            <div class="chat-content-wrap">
                                <div class="chat-wrap-inner">
                                    <div class="chat-box">
                                        <div class="task-wrapper">
                                            <div class="task-list-container">
                                                <div class="task-list-body">
                                                    <ul id="task-list">
                                                        <li class="task">
                                                            <div class="task-container">
                                                                <span class="task-action-btn task-check">
                                                                    <span class="action-circle large complete-btn"
                                                                        title="Mark Complete">
                                                                        <i class="material-icons">check</i>
                                                                    </span>
                                                                </span>
                                                                <span class="task-label" contenteditable="true">Patient
                                                                    appointment booking</span>
                                                                <span class="task-action-btn task-btn-right">
                                                                    <span class="action-circle large" title="Assign">
                                                                        <i class="material-icons">person_add</i>
                                                                    </span>
                                                                    <span class="action-circle large delete-btn"
                                                                        title="Delete Task">
                                                                        <i class="material-icons">delete</i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="task">
                                                            <div class="task-container">
                                                                <span class="task-action-btn task-check">
                                                                    <span class="action-circle large complete-btn"
                                                                        title="Mark Complete">
                                                                        <i class="material-icons">check</i>
                                                                    </span>
                                                                </span>
                                                                <span class="task-label" contenteditable="true">Appointment
                                                                    booking with payment gateway</span>
                                                                <span class="task-action-btn task-btn-right">
                                                                    <span class="action-circle large" title="Assign">
                                                                        <i class="material-icons">person_add</i>
                                                                    </span>
                                                                    <span class="action-circle large delete-btn"
                                                                        title="Delete Task">
                                                                        <i class="material-icons">delete</i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="completed task">
                                                            <div class="task-container">
                                                                <span class="task-action-btn task-check">
                                                                    <span class="action-circle large complete-btn"
                                                                        title="Mark Complete">
                                                                        <i class="material-icons">check</i>
                                                                    </span>
                                                                </span>
                                                                <span class="task-label">Doctor available module</span>
                                                                <span class="task-action-btn task-btn-right">
                                                                    <span class="action-circle large" title="Assign">
                                                                        <i class="material-icons">person_add</i>
                                                                    </span>
                                                                    <span class="action-circle large delete-btn"
                                                                        title="Delete Task">
                                                                        <i class="material-icons">delete</i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="task">
                                                            <div class="task-container">
                                                                <span class="task-action-btn task-check">
                                                                    <span class="action-circle large complete-btn"
                                                                        title="Mark Complete">
                                                                        <i class="material-icons">check</i>
                                                                    </span>
                                                                </span>
                                                                <span class="task-label" contenteditable="true">Patient and
                                                                    Doctor video conferencing</span>
                                                                <span class="task-action-btn task-btn-right">
                                                                    <span class="action-circle large" title="Assign">
                                                                        <i class="material-icons">person_add</i>
                                                                    </span>
                                                                    <span class="action-circle large delete-btn"
                                                                        title="Delete Task">
                                                                        <i class="material-icons">delete</i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="task">
                                                            <div class="task-container">
                                                                <span class="task-action-btn task-check">
                                                                    <span class="action-circle large complete-btn"
                                                                        title="Mark Complete">
                                                                        <i class="material-icons">check</i>
                                                                    </span>
                                                                </span>
                                                                <span class="task-label" contenteditable="true">Private
                                                                    chat module</span>
                                                                <span class="task-action-btn task-btn-right">
                                                                    <span class="action-circle large" title="Assign">
                                                                        <i class="material-icons">person_add</i>
                                                                    </span>
                                                                    <span class="action-circle large delete-btn"
                                                                        title="Delete Task">
                                                                        <i class="material-icons">delete</i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="task">
                                                            <div class="task-container">
                                                                <span class="task-action-btn task-check">
                                                                    <span class="action-circle large complete-btn"
                                                                        title="Mark Complete">
                                                                        <i class="material-icons">check</i>
                                                                    </span>
                                                                </span>
                                                                <span class="task-label" contenteditable="true">Patient
                                                                    Profile add</span>
                                                                <span class="task-action-btn task-btn-right">
                                                                    <span class="action-circle large" title="Assign">
                                                                        <i class="material-icons">person_add</i>
                                                                    </span>
                                                                    <span class="action-circle large delete-btn"
                                                                        title="Delete Task">
                                                                        <i class="material-icons">delete</i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="task-list-footer">
                                                    <div class="new-task-wrapper">
                                                        <textarea id="new-task" placeholder="Enter new task here. . ."></textarea>
                                                        <span class="error-message hidden">You need to enter a task
                                                            first</span>
                                                        <span class="add-new-task-btn btn" id="add-task">Add Task</span>
                                                        <span class="btn" id="close-task-panel">Close</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="notification-popup hide">
                                            <p>
                                                <span class="task"></span>
                                                <span class="notification-text"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 message-view task-chat-view task-right-sidebar" id="task_window">
                    <div class="chat-window">
                        <div class="fixed-header">
                            <div class="navbar">
                                <div class="task-assign">
                                    <a class="task-complete-btn" id="task_complete" href="javascript:void(0);">
                                        <i class="material-icons">check</i> Mark Complete
                                    </a>
                                </div>
                                <ul class="nav float-end custom-menu">
                                    <li class="dropdown dropdown-action">
                                        <a href="" class="dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-end custom-dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)">Delete Task</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Settings</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="chat-contents task-chat-contents">
                            <div class="chat-content-wrap">
                                <div class="chat-wrap-inner">
                                    <div class="chat-box">
                                        <div class="chats">
                                            <h4>Hospital Administration Phase 1</h4>
                                            <div class="task-header">
                                                <div class="assignee-info">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#assignee">
                                                        <div class="avatar">
                                                            <img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
                                                        </div>
                                                        <div class="assigned-info">
                                                            <div class="task-head-title">Assigned To</div>
                                                            <div class="task-assignee">John Doe</div>
                                                        </div>
                                                    </a>
                                                    <span class="remove-icon">
                                                        <i class="fa fa-close"></i>
                                                    </span>
                                                </div>
                                                <div class="task-due-date">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#assignee">
                                                        <div class="due-icon">
                                                            <span>
                                                                <i class="material-icons">date_range</i>
                                                            </span>
                                                        </div>
                                                        <div class="due-info">
                                                            <div class="task-head-title">Due Date</div>
                                                            <div class="due-date">Mar 26, 2019</div>
                                                        </div>
                                                    </a>
                                                    <span class="remove-icon">
                                                        <i class="fa fa-close"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <hr class="task-line">
                                            <div class="task-desc">
                                                <div class="task-desc-icon">
                                                    <i class="material-icons">subject</i>
                                                </div>
                                                <div class="task-textarea">
                                                    <textarea class="form-control" placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                            <hr class="task-line">
                                            <div class="task-information">
                                                <span class="task-info-line"><a class="task-user" href="#">Lesley
                                                        Grauer</a> <span class="task-info-subject">created
                                                        task</span></span>
                                                <div class="task-time">Jan 20, 2019</div>
                                            </div>
                                            <div class="task-information">
                                                <span class="task-info-line"><a class="task-user" href="#">Lesley
                                                        Grauer</a> <span class="task-info-subject">added to Hospital
                                                        Administration</span></span>
                                                <div class="task-time">Jan 20, 2019</div>
                                            </div>
                                            <div class="task-information">
                                                <span class="task-info-line"><a class="task-user" href="#">Lesley
                                                        Grauer</a> <span class="task-info-subject">assigned to John
                                                        Doe</span></span>
                                                <div class="task-time">Jan 20, 2019</div>
                                            </div>
                                            <hr class="task-line">
                                            <div class="task-information">
                                                <span class="task-info-line"><a class="task-user" href="#">John
                                                        Doe</a> <span class="task-info-subject">changed the due date to Sep
                                                        28</span> </span>
                                                <div class="task-time">9:09pm</div>
                                            </div>
                                            <div class="task-information">
                                                <span class="task-info-line"><a class="task-user" href="#">John
                                                        Doe</a> <span class="task-info-subject">assigned to
                                                        you</span></span>
                                                <div class="task-time">9:10pm</div>
                                            </div>
                                            <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a href="profile.html" class="avatar">
                                                        <img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-bubble">
                                                        <div class="chat-content">
                                                            <span class="task-chat-user">John Doe</span> <span
                                                                class="chat-time">8:35 am</span>
                                                            <p>I'm just looking around.</p>
                                                            <p>Will you tell me something about yourself? </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="completed-task-msg"><span class="task-success"><a
                                                        href="#">John Doe</a> completed this task.</span> <span
                                                    class="task-time">Today at 9:27am</span></div>
                                            <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a href="profile.html" class="avatar">
                                                        <img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-bubble">
                                                        <div class="chat-content">
                                                            <span class="task-chat-user">John Doe</span> <span
                                                                class="file-attached">attached 3 files <i
                                                                    class="fa-solid fa-paperclip"></i></span> <span
                                                                class="chat-time">Feb 17, 2019 at 4:32am</span>
                                                            <ul class="attach-list">
                                                                <li><i class="fa fa-file"></i> <a
                                                                        href="#">project_document.avi</a></li>
                                                                <li><i class="fa fa-file"></i> <a
                                                                        href="#">video_conferencing.psd</a></li>
                                                                <li><i class="fa fa-file"></i> <a
                                                                        href="#">landing_page.psd</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a href="profile.html" class="avatar">
                                                        <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-bubble">
                                                        <div class="chat-content">
                                                            <span class="task-chat-user">Jeffery Lalor</span> <span
                                                                class="file-attached">attached file <i
                                                                    class="fa-solid fa-paperclip"></i></span> <span
                                                                class="chat-time">Yesterday at 9:16pm</span>
                                                            <ul class="attach-list">
                                                                <li class="pdf-file"><i
                                                                        class="fa-regular fa-file-pdf"></i> <a
                                                                        href="#">Document_2016.pdf</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a href="profile.html" class="avatar">
                                                        <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-bubble">
                                                        <div class="chat-content">
                                                            <span class="task-chat-user">Jeffery Lalor</span> <span
                                                                class="file-attached">attached file <i
                                                                    class="fa-solid fa-paperclip"></i></span> <span
                                                                class="chat-time">Today at 12:42pm</span>
                                                            <ul class="attach-list">
                                                                <li class="img-file">
                                                                    <div class="attach-img-download"><a
                                                                            href="#">avatar-1.jpg</a></div>
                                                                    <div class="task-attach-img"><img
                                                                            src="assets/img/user.jpg" alt="User Image">
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-information">
                                                <span class="task-info-line">
                                                    <a class="task-user" href="#">John Doe</a>
                                                    <span class="task-info-subject">marked task as incomplete</span>
                                                </span>
                                                <div class="task-time">1:16pm</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-footer">
                            <div class="message-bar">
                                <div class="message-inner">
                                    <a class="link attach-icon" href="#"><img src="assets/img/attachment.png"
                                            alt="Attachment Icon"></a>
                                    <div class="message-area">
                                        <div class="input-group">
                                            <textarea class="form-control" placeholder="Type message..."></textarea>
                                            <button class="btn btn-primary" type="button"><i
                                                    class="fa-solid fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="project-members task-followers">
                                <span class="followers-title">Followers</span>
                                <a class="avatar" href="#" data-bs-toggle="tooltip" aria-label="Jeffery Lalor"
                                    data-bs-original-title="Jeffery Lalor">
                                    <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                </a>
                                <a class="avatar" href="#" data-bs-toggle="tooltip" aria-label="Richard Miles"
                                    data-bs-original-title="Richard Miles">
                                    <img src="assets/img/profiles/avatar-09.jpg" alt="User Image">
                                </a>
                                <a class="avatar" href="#" data-bs-toggle="tooltip" aria-label="John Smith"
                                    data-bs-original-title="John Smith">
                                    <img src="assets/img/profiles/avatar-10.jpg" alt="User Image">
                                </a>
                                <a class="avatar" href="#" data-bs-toggle="tooltip" aria-label="Mike Litorus"
                                    data-bs-original-title="Mike Litorus">
                                    <img src="assets/img/profiles/avatar-05.jpg" alt="User Image">
                                </a>
                                <a href="#" class="followers-add" data-bs-toggle="modal"
                                    data-bs-target="#task_followers"><i class="material-icons">add</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="create_project" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Project Name</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Client</label>
                                        <select class="select select2-hidden-accessible"
                                            data-select2-id="select2-data-1-z5c7" tabindex="-1" aria-hidden="true">
                                            <option data-select2-id="select2-data-3-k7p4">Global Technologies</option>
                                            <option>Delta Infotech</option>
                                        </select><span class="select2 select2-container select2-container--default"
                                            dir="ltr" data-select2-id="select2-data-2-bwxe"
                                            style="width: 100%;"><span class="selection"><span
                                                    class="select2-selection select2-selection--single" role="combobox"
                                                    aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                    aria-disabled="false" aria-labelledby="select2-xr8g-container"
                                                    aria-controls="select2-xr8g-container"><span
                                                        class="select2-selection__rendered" id="select2-xr8g-container"
                                                        role="textbox" aria-readonly="true"
                                                        title="Global Technologies">Global Technologies</span><span
                                                        class="select2-selection__arrow" role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Start Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">End Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Rate</label>
                                        <input placeholder="$50" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">&nbsp;</label>
                                        <select class="select select2-hidden-accessible"
                                            data-select2-id="select2-data-4-m6or" tabindex="-1" aria-hidden="true">
                                            <option data-select2-id="select2-data-6-mvqo">Hourly</option>
                                            <option>Fixed</option>
                                        </select><span class="select2 select2-container select2-container--default"
                                            dir="ltr" data-select2-id="select2-data-5-0hqw"
                                            style="width: 100%;"><span class="selection"><span
                                                    class="select2-selection select2-selection--single" role="combobox"
                                                    aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                    aria-disabled="false" aria-labelledby="select2-lc7s-container"
                                                    aria-controls="select2-lc7s-container"><span
                                                        class="select2-selection__rendered" id="select2-lc7s-container"
                                                        role="textbox" aria-readonly="true"
                                                        title="Hourly">Hourly</span><span class="select2-selection__arrow"
                                                        role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Priority</label>
                                        <select class="select select2-hidden-accessible"
                                            data-select2-id="select2-data-7-743u" tabindex="-1" aria-hidden="true">
                                            <option data-select2-id="select2-data-9-phg2">High</option>
                                            <option>Medium</option>
                                            <option>Low</option>
                                        </select><span class="select2 select2-container select2-container--default"
                                            dir="ltr" data-select2-id="select2-data-8-03mx"
                                            style="width: 100%;"><span class="selection"><span
                                                    class="select2-selection select2-selection--single" role="combobox"
                                                    aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                    aria-disabled="false" aria-labelledby="select2-45lk-container"
                                                    aria-controls="select2-45lk-container"><span
                                                        class="select2-selection__rendered" id="select2-45lk-container"
                                                        role="textbox" aria-readonly="true"
                                                        title="High">High</span><span class="select2-selection__arrow"
                                                        role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Add Project Leader</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Team Leader</label>
                                        <div class="project-members">
                                            <a class="avatar" href="#" data-bs-toggle="tooltip"
                                                aria-label="Jeffery Lalor" data-bs-original-title="Jeffery Lalor">
                                                <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Add Team</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Team Members</label>
                                        <div class="project-members">
                                            <a class="avatar" href="#" data-bs-toggle="tooltip"
                                                aria-label="John Doe" data-bs-original-title="John Doe">
                                                <img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
                                            </a>
                                            <a class="avatar" href="#" data-bs-toggle="tooltip"
                                                aria-label="Richard Miles" data-bs-original-title="Richard Miles">
                                                <img src="assets/img/profiles/avatar-09.jpg" alt="User Image">
                                            </a>
                                            <a class="avatar" href="#" data-bs-toggle="tooltip"
                                                aria-label="John Smith" data-bs-original-title="John Smith">
                                                <img src="assets/img/profiles/avatar-10.jpg" alt="User Image">
                                            </a>
                                            <a class="avatar" href="#" data-bs-toggle="tooltip"
                                                aria-label="Mike Litorus" data-bs-original-title="Mike Litorus">
                                                <img src="assets/img/profiles/avatar-05.jpg" alt="User Image">
                                            </a>
                                            <span class="all-team">+2</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-block mb-3">
                                <label class="col-form-label">Description</label>
                                <div id="editor" style="display: none;"></div>
                                <div class="ck ck-reset ck-editor ck-rounded-corners" role="application" dir="ltr"
                                    lang="en" aria-labelledby="ck-editor__label_ef2465f65df4c0d01912bf0ac805ff66d">
                                    <label class="ck ck-label ck-voice-label"
                                        id="ck-editor__label_ef2465f65df4c0d01912bf0ac805ff66d">Rich Text Editor</label>
                                    <div class="ck ck-editor__top ck-reset_all" role="presentation">
                                        <div class="ck ck-sticky-panel">
                                            <div class="ck ck-sticky-panel__placeholder" style="display: none;"></div>
                                            <div class="ck ck-sticky-panel__content">
                                                <div class="ck ck-toolbar" role="toolbar" aria-label="Editor toolbar">
                                                    <div class="ck ck-toolbar__items">
                                                        <div class="ck ck-dropdown ck-heading-dropdown"><button
                                                                class="ck ck-button ck-off ck-button_with-text ck-dropdown__button"
                                                                type="button" tabindex="-1"
                                                                aria-labelledby="ck-editor__aria-label_e0c152e100c2ce316e8d194f255dbbf4e"
                                                                aria-haspopup="true"><span
                                                                    class="ck ck-tooltip ck-tooltip_s"><span
                                                                        class="ck ck-tooltip__text">Heading</span></span><span
                                                                    class="ck ck-button__label"
                                                                    id="ck-editor__aria-label_e0c152e100c2ce316e8d194f255dbbf4e">Paragraph</span><svg
                                                                    class="ck ck-icon ck-dropdown__arrow"
                                                                    viewBox="0 0 10 10">
                                                                    <path
                                                                        d="M.941 4.523a.75.75 0 1 1 1.06-1.06l3.006 3.005 3.005-3.005a.75.75 0 1 1 1.06 1.06l-3.549 3.55a.75.75 0 0 1-1.168-.136L.941 4.523z">
                                                                    </path>
                                                                </svg></button>
                                                            <div
                                                                class="ck ck-reset ck-dropdown__panel ck-dropdown__panel_se">
                                                                <ul class="ck ck-reset ck-list">
                                                                    <li class="ck ck-list__item"><button
                                                                            class="ck ck-button ck-heading_paragraph ck-on ck-button_with-text"
                                                                            type="button" tabindex="-1"
                                                                            aria-labelledby="ck-editor__aria-label_e46a41d91e7d0f2698515643a455a3f71"><span
                                                                                class="ck ck-tooltip ck-tooltip_s ck-hidden"><span
                                                                                    class="ck ck-tooltip__text"></span></span><span
                                                                                class="ck ck-button__label"
                                                                                id="ck-editor__aria-label_e46a41d91e7d0f2698515643a455a3f71">Paragraph</span></button>
                                                                    </li>
                                                                    <li class="ck ck-list__item"><button
                                                                            class="ck ck-button ck-heading_heading1 ck-off ck-button_with-text"
                                                                            type="button" tabindex="-1"
                                                                            aria-labelledby="ck-editor__aria-label_e31362363dad9784a7e5a7316b04ed7c2"><span
                                                                                class="ck ck-tooltip ck-tooltip_s ck-hidden"><span
                                                                                    class="ck ck-tooltip__text"></span></span><span
                                                                                class="ck ck-button__label"
                                                                                id="ck-editor__aria-label_e31362363dad9784a7e5a7316b04ed7c2">Heading
                                                                                1</span></button></li>
                                                                    <li class="ck ck-list__item"><button
                                                                            class="ck ck-button ck-heading_heading2 ck-off ck-button_with-text"
                                                                            type="button" tabindex="-1"
                                                                            aria-labelledby="ck-editor__aria-label_e1584f89b3b43131dedfd3470f952e511"><span
                                                                                class="ck ck-tooltip ck-tooltip_s ck-hidden"><span
                                                                                    class="ck ck-tooltip__text"></span></span><span
                                                                                class="ck ck-button__label"
                                                                                id="ck-editor__aria-label_e1584f89b3b43131dedfd3470f952e511">Heading
                                                                                2</span></button></li>
                                                                    <li class="ck ck-list__item"><button
                                                                            class="ck ck-button ck-heading_heading3 ck-off ck-button_with-text"
                                                                            type="button" tabindex="-1"
                                                                            aria-labelledby="ck-editor__aria-label_eed31ac4e54d4b5c39e6e3fc23c22b41f"><span
                                                                                class="ck ck-tooltip ck-tooltip_s ck-hidden"><span
                                                                                    class="ck ck-tooltip__text"></span></span><span
                                                                                class="ck ck-button__label"
                                                                                id="ck-editor__aria-label_eed31ac4e54d4b5c39e6e3fc23c22b41f">Heading
                                                                                3</span></button></li>
                                                                </ul>
                                                            </div>
                                                        </div><span class="ck ck-toolbar__separator"></span><button
                                                            class="ck ck-button ck-off" type="button" tabindex="-1"
                                                            aria-labelledby="ck-editor__aria-label_ebc0f00d2aa044427d1ddd91de063adca"
                                                            aria-pressed="false"><svg class="ck ck-icon ck-button__icon"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M10.187 17H5.773c-.637 0-1.092-.138-1.364-.415-.273-.277-.409-.718-.409-1.323V4.738c0-.617.14-1.062.419-1.332.279-.27.73-.406 1.354-.406h4.68c.69 0 1.288.041 1.793.124.506.083.96.242 1.36.478.341.197.644.447.906.75a3.262 3.262 0 0 1 .808 2.162c0 1.401-.722 2.426-2.167 3.075C15.05 10.175 16 11.315 16 13.01a3.756 3.756 0 0 1-2.296 3.504 6.1 6.1 0 0 1-1.517.377c-.571.073-1.238.11-2 .11zm-.217-6.217H7v4.087h3.069c1.977 0 2.965-.69 2.965-2.072 0-.707-.256-1.22-.768-1.537-.512-.319-1.277-.478-2.296-.478zM7 5.13v3.619h2.606c.729 0 1.292-.067 1.69-.2a1.6 1.6 0 0 0 .91-.765c.165-.267.247-.566.247-.897 0-.707-.26-1.176-.778-1.409-.519-.232-1.31-.348-2.375-.348H7z">
                                                                </path>
                                                            </svg><span class="ck ck-tooltip ck-tooltip_s"><span
                                                                    class="ck ck-tooltip__text">Bold
                                                                    (Ctrl+B)</span></span><span class="ck ck-button__label"
                                                                id="ck-editor__aria-label_ebc0f00d2aa044427d1ddd91de063adca">Bold</span></button><button
                                                            class="ck ck-button ck-off" type="button" tabindex="-1"
                                                            aria-labelledby="ck-editor__aria-label_e7ef1553a7f54fde4197870d2bc0aa768"
                                                            aria-pressed="false"><svg class="ck ck-icon ck-button__icon"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="m9.586 14.633.021.004c-.036.335.095.655.393.962.082.083.173.15.274.201h1.474a.6.6 0 1 1 0 1.2H5.304a.6.6 0 0 1 0-1.2h1.15c.474-.07.809-.182 1.005-.334.157-.122.291-.32.404-.597l2.416-9.55a1.053 1.053 0 0 0-.281-.823 1.12 1.12 0 0 0-.442-.296H8.15a.6.6 0 0 1 0-1.2h6.443a.6.6 0 1 1 0 1.2h-1.195c-.376.056-.65.155-.823.296-.215.175-.423.439-.623.79l-2.366 9.347z">
                                                                </path>
                                                            </svg><span class="ck ck-tooltip ck-tooltip_s"><span
                                                                    class="ck ck-tooltip__text">Italic
                                                                    (Ctrl+I)</span></span><span class="ck ck-button__label"
                                                                id="ck-editor__aria-label_e7ef1553a7f54fde4197870d2bc0aa768">Italic</span></button><span
                                                            class="ck ck-toolbar__separator"></span><button
                                                            class="ck ck-button ck-off" type="button" tabindex="-1"
                                                            aria-labelledby="ck-editor__aria-label_ecf1f87e6f0e318611699a30c2b594317"
                                                            aria-pressed="false"><svg class="ck ck-icon ck-button__icon"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="m11.077 15 .991-1.416a.75.75 0 1 1 1.229.86l-1.148 1.64a.748.748 0 0 1-.217.206 5.251 5.251 0 0 1-8.503-5.955.741.741 0 0 1 .12-.274l1.147-1.639a.75.75 0 1 1 1.228.86L4.933 10.7l.006.003a3.75 3.75 0 0 0 6.132 4.294l.006.004zm5.494-5.335a.748.748 0 0 1-.12.274l-1.147 1.639a.75.75 0 1 1-1.228-.86l.86-1.23a3.75 3.75 0 0 0-6.144-4.301l-.86 1.229a.75.75 0 0 1-1.229-.86l1.148-1.64a.748.748 0 0 1 .217-.206 5.251 5.251 0 0 1 8.503 5.955zm-4.563-2.532a.75.75 0 0 1 .184 1.045l-3.155 4.505a.75.75 0 1 1-1.229-.86l3.155-4.506a.75.75 0 0 1 1.045-.184z">
                                                                </path>
                                                            </svg><span class="ck ck-tooltip ck-tooltip_s"><span
                                                                    class="ck ck-tooltip__text">Link
                                                                    (Ctrl+K)</span></span><span class="ck ck-button__label"
                                                                id="ck-editor__aria-label_ecf1f87e6f0e318611699a30c2b594317">Link</span></button><span
                                                            class="ck ck-toolbar__separator"></span><button
                                                            class="ck ck-button ck-disabled ck-off" type="button"
                                                            tabindex="-1"
                                                            aria-labelledby="ck-editor__aria-label_ed2a7ca9759073bee68e2da4d79fa2c9f"
                                                            aria-disabled="true"><svg class="ck ck-icon ck-button__icon"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M2 3.75c0 .414.336.75.75.75h14.5a.75.75 0 1 0 0-1.5H2.75a.75.75 0 0 0-.75.75zm5 6c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zM2.75 16.5h14.5a.75.75 0 1 0 0-1.5H2.75a.75.75 0 1 0 0 1.5zm1.618-9.55L.98 9.358a.4.4 0 0 0 .013.661l3.39 2.207A.4.4 0 0 0 5 11.892V7.275a.4.4 0 0 0-.632-.326z">
                                                                </path>
                                                            </svg><span class="ck ck-tooltip ck-tooltip_s"><span
                                                                    class="ck ck-tooltip__text">Decrease
                                                                    indent</span></span><span class="ck ck-button__label"
                                                                id="ck-editor__aria-label_ed2a7ca9759073bee68e2da4d79fa2c9f">Decrease
                                                                indent</span></button><button
                                                            class="ck ck-button ck-disabled ck-off" type="button"
                                                            tabindex="-1"
                                                            aria-labelledby="ck-editor__aria-label_e8c56541358608ee4b94009ab2aa8a55a"
                                                            aria-disabled="true"><svg class="ck ck-icon ck-button__icon"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M2 3.75c0 .414.336.75.75.75h14.5a.75.75 0 1 0 0-1.5H2.75a.75.75 0 0 0-.75.75zm5 6c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zM2.75 16.5h14.5a.75.75 0 1 0 0-1.5H2.75a.75.75 0 1 0 0 1.5zM1.632 6.95 5.02 9.358a.4.4 0 0 1-.013.661l-3.39 2.207A.4.4 0 0 1 1 11.892V7.275a.4.4 0 0 1 .632-.326z">
                                                                </path>
                                                            </svg><span class="ck ck-tooltip ck-tooltip_s"><span
                                                                    class="ck ck-tooltip__text">Increase
                                                                    indent</span></span><span class="ck ck-button__label"
                                                                id="ck-editor__aria-label_e8c56541358608ee4b94009ab2aa8a55a">Increase
                                                                indent</span></button><span
                                                            class="ck ck-toolbar__separator"></span><button
                                                            class="ck ck-button ck-off" type="button" tabindex="-1"
                                                            aria-labelledby="ck-editor__aria-label_ec538301ff1ee4dccaaaf7a06f86853b6"
                                                            aria-pressed="false"><svg class="ck ck-icon ck-button__icon"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M7 5.75c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zm-6 0C1 4.784 1.777 4 2.75 4c.966 0 1.75.777 1.75 1.75 0 .966-.777 1.75-1.75 1.75C1.784 7.5 1 6.723 1 5.75zm6 9c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zm-6 0c0-.966.777-1.75 1.75-1.75.966 0 1.75.777 1.75 1.75 0 .966-.777 1.75-1.75 1.75-.966 0-1.75-.777-1.75-1.75z">
                                                                </path>
                                                            </svg><span class="ck ck-tooltip ck-tooltip_s"><span
                                                                    class="ck ck-tooltip__text">Bulleted
                                                                    List</span></span><span class="ck ck-button__label"
                                                                id="ck-editor__aria-label_ec538301ff1ee4dccaaaf7a06f86853b6">Bulleted
                                                                List</span></button><button class="ck ck-button ck-off"
                                                            type="button" tabindex="-1"
                                                            aria-labelledby="ck-editor__aria-label_e548ef8a5f3be1c46874622a0dbc0d28b"
                                                            aria-pressed="false"><svg class="ck ck-icon ck-button__icon"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M7 5.75c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zM3.5 3v5H2V3.7H1v-1h2.5V3zM.343 17.857l2.59-3.257H2.92a.6.6 0 1 0-1.04 0H.302a2 2 0 1 1 3.995 0h-.001c-.048.405-.16.734-.333.988-.175.254-.59.692-1.244 1.312H4.3v1h-4l.043-.043zM7 14.75a.75.75 0 0 1 .75-.75h9.5a.75.75 0 1 1 0 1.5h-9.5a.75.75 0 0 1-.75-.75z">
                                                                </path>
                                                            </svg><span class="ck ck-tooltip ck-tooltip_s"><span
                                                                    class="ck ck-tooltip__text">Numbered
                                                                    List</span></span><span class="ck ck-button__label"
                                                                id="ck-editor__aria-label_e548ef8a5f3be1c46874622a0dbc0d28b">Numbered
                                                                List</span></button><span
                                                            class="ck ck-toolbar__separator"></span>
                                                        <div class="ck ck-dropdown"><button
                                                                class="ck ck-button ck-off ck-dropdown__button"
                                                                type="button" tabindex="-1"
                                                                aria-labelledby="ck-editor__aria-label_e97151d10f9d4f73d8a24fd68a2430884"
                                                                aria-haspopup="true"><svg
                                                                    class="ck ck-icon ck-button__icon"
                                                                    viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M3 6v3h4V6H3zm0 4v3h4v-3H3zm0 4v3h4v-3H3zm5 3h4v-3H8v3zm5 0h4v-3h-4v3zm4-4v-3h-4v3h4zm0-4V6h-4v3h4zm1.5 8a1.5 1.5 0 0 1-1.5 1.5H3A1.5 1.5 0 0 1 1.5 17V4c.222-.863 1.068-1.5 2-1.5h13c.932 0 1.778.637 2 1.5v13zM12 13v-3H8v3h4zm0-4V6H8v3h4z">
                                                                    </path>
                                                                </svg><span class="ck ck-tooltip ck-tooltip_s"><span
                                                                        class="ck ck-tooltip__text">Insert
                                                                        table</span></span><span
                                                                    class="ck ck-button__label"
                                                                    id="ck-editor__aria-label_e97151d10f9d4f73d8a24fd68a2430884">Insert
                                                                    table</span><svg class="ck ck-icon ck-dropdown__arrow"
                                                                    viewBox="0 0 10 10">
                                                                    <path
                                                                        d="M.941 4.523a.75.75 0 1 1 1.06-1.06l3.006 3.005 3.005-3.005a.75.75 0 1 1 1.06 1.06l-3.549 3.55a.75.75 0 0 1-1.168-.136L.941 4.523z">
                                                                    </path>
                                                                </svg></button>
                                                            <div
                                                                class="ck ck-reset ck-dropdown__panel ck-dropdown__panel_se">
                                                            </div>
                                                        </div><span class="ck ck-toolbar__separator"></span><span
                                                            class="ck-file-dialog-button"><button
                                                                class="ck ck-button ck-off" type="button" tabindex="-1"
                                                                aria-labelledby="ck-editor__aria-label_e35e1e95831577d54238c651d5a1e1d64"><svg
                                                                    class="ck ck-icon ck-button__icon"
                                                                    viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M6.91 10.54c.26-.23.64-.21.88.03l3.36 3.14 2.23-2.06a.64.64 0 0 1 .87 0l2.52 2.97V4.5H3.2v10.12l3.71-4.08zm10.27-7.51c.6 0 1.09.47 1.09 1.05v11.84c0 .59-.49 1.06-1.09 1.06H2.79c-.6 0-1.09-.47-1.09-1.06V4.08c0-.58.49-1.05 1.1-1.05h14.38zm-5.22 5.56a1.96 1.96 0 1 1 3.4-1.96 1.96 1.96 0 0 1-3.4 1.96z">
                                                                    </path>
                                                                </svg><span class="ck ck-tooltip ck-tooltip_s"><span
                                                                        class="ck ck-tooltip__text">Insert
                                                                        image</span></span><span
                                                                    class="ck ck-button__label"
                                                                    id="ck-editor__aria-label_e35e1e95831577d54238c651d5a1e1d64">Insert
                                                                    image</span></button><input class="ck-hidden"
                                                                type="file" tabindex="-1"
                                                                accept="image/jpeg,image/png,image/gif,image/bmp,image/webp,image/tiff"
                                                                multiple="true"></span><button class="ck ck-button ck-off"
                                                            type="button" tabindex="-1"
                                                            aria-labelledby="ck-editor__aria-label_ea6f08475533b6572b0d0c45f00b59bad"
                                                            aria-pressed="false"><svg class="ck ck-icon ck-button__icon"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M3 10.423a6.5 6.5 0 0 1 6.056-6.408l.038.67C6.448 5.423 5.354 7.663 5.22 10H9c.552 0 .5.432.5.986v4.511c0 .554-.448.503-1 .503h-5c-.552 0-.5-.449-.5-1.003v-4.574zm8 0a6.5 6.5 0 0 1 6.056-6.408l.038.67c-2.646.739-3.74 2.979-3.873 5.315H17c.552 0 .5.432.5.986v4.511c0 .554-.448.503-1 .503h-5c-.552 0-.5-.449-.5-1.003v-4.574z">
                                                                </path>
                                                            </svg><span class="ck ck-tooltip ck-tooltip_s"><span
                                                                    class="ck ck-tooltip__text">Block
                                                                    quote</span></span><span class="ck ck-button__label"
                                                                id="ck-editor__aria-label_ea6f08475533b6572b0d0c45f00b59bad">Block
                                                                quote</span></button><span
                                                            class="ck ck-toolbar__separator"></span><button
                                                            class="ck ck-button ck-disabled ck-off" type="button"
                                                            tabindex="-1"
                                                            aria-labelledby="ck-editor__aria-label_e305d1a7387c43f65abee9143a47d93f4"
                                                            aria-disabled="true"><svg class="ck ck-icon ck-button__icon"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="m5.042 9.367 2.189 1.837a.75.75 0 0 1-.965 1.149l-3.788-3.18a.747.747 0 0 1-.21-.284.75.75 0 0 1 .17-.945L6.23 4.762a.75.75 0 1 1 .964 1.15L4.863 7.866h8.917A.75.75 0 0 1 14 7.9a4 4 0 1 1-1.477 7.718l.344-1.489a2.5 2.5 0 1 0 1.094-4.73l.008-.032H5.042z">
                                                                </path>
                                                            </svg><span class="ck ck-tooltip ck-tooltip_s"><span
                                                                    class="ck ck-tooltip__text">Undo
                                                                    (Ctrl+Z)</span></span><span class="ck ck-button__label"
                                                                id="ck-editor__aria-label_e305d1a7387c43f65abee9143a47d93f4">Undo</span></button><button
                                                            class="ck ck-button ck-disabled ck-off" type="button"
                                                            tabindex="-1"
                                                            aria-labelledby="ck-editor__aria-label_ef7fe57b28247ec92fc06af5e80757c0c"
                                                            aria-disabled="true"><svg class="ck ck-icon ck-button__icon"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="m14.958 9.367-2.189 1.837a.75.75 0 0 0 .965 1.149l3.788-3.18a.747.747 0 0 0 .21-.284.75.75 0 0 0-.17-.945L13.77 4.762a.75.75 0 1 0-.964 1.15l2.331 1.955H6.22A.75.75 0 0 0 6 7.9a4 4 0 1 0 1.477 7.718l-.344-1.489A2.5 2.5 0 1 1 6.039 9.4l-.008-.032h8.927z">
                                                                </path>
                                                            </svg><span class="ck ck-tooltip ck-tooltip_s"><span
                                                                    class="ck ck-tooltip__text">Redo
                                                                    (Ctrl+Y)</span></span><span class="ck ck-button__label"
                                                                id="ck-editor__aria-label_ef7fe57b28247ec92fc06af5e80757c0c">Redo</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ck ck-editor__main" role="presentation">
                                        <div class="ck-blurred ck ck-content ck-editor__editable ck-rounded-corners ck-editor__editable_inline"
                                            lang="en" dir="ltr" role="textbox"
                                            aria-label="Rich Text Editor, main" contenteditable="true">
                                            <p><br data-cke-filler="true"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-block mb-3">
                                <label class="col-form-label">Upload Files</label>
                                <input class="form-control" type="file">
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div id="assignee" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign to this task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group m-b-30">
                            <input placeholder="Search to add" class="form-control search-input" type="text">
                            <button class="btn btn-primary">Search</button>
                        </div>
                        <div>
                            <ul class="chat-user-list">
                                <li>
                                    <a href="#">
                                        <div class="chat-block d-flex">
                                            <span class="avatar"><img src="assets/img/profiles/avatar-09.jpg"
                                                    alt="User Image"></span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">Richard Miles</div>
                                                <span class="designation">Web Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="chat-block d-flex">
                                            <span class="avatar"><img src="assets/img/profiles/avatar-10.jpg"
                                                    alt="User Image"></span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">John Smith</div>
                                                <span class="designation">Android Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="chat-block d-flex">
                                            <span class="avatar">
                                                <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                            </span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">Jeffery Lalor</div>
                                                <span class="designation">Team Leader</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Assign</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="task_followers" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add followers to this task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group m-b-30">
                            <input placeholder="Search to add" class="form-control search-input" type="text">
                            <button class="btn btn-primary">Search</button>
                        </div>
                        <div>
                            <ul class="chat-user-list">
                                <li>
                                    <a href="#">
                                        <div class="chat-block d-flex">
                                            <span class="avatar"><img src="assets/img/profiles/avatar-16.jpg"
                                                    alt="User Image"></span>
                                            <div class="media-body media-middle text-nowrap">
                                                <div class="user-name">Jeffery Lalor</div>
                                                <span class="designation">Team Leader</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="chat-block d-flex">
                                            <span class="avatar"><img src="assets/img/profiles/avatar-08.jpg"
                                                    alt="User Image"></span>
                                            <div class="media-body media-middle text-nowrap">
                                                <div class="user-name">Catherine Manseau</div>
                                                <span class="designation">Android Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="chat-block d-flex">
                                            <span class="avatar"><img src="assets/img/profiles/avatar-26.jpg"
                                                    alt="User Image"></span>
                                            <div class="media-body media-middle text-nowrap">
                                                <div class="user-name">Wilmer Deluna</div>
                                                <span class="designation">Team Leader</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Add to Follow</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
