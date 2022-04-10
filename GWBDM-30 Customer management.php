@model IEnumerable<WatchStore.Models.MUser>

@{
    ViewBag.Title = "Khách hàng";
    Layout = "~/Areas/Admin/Views/Shared/_LayoutAdmin.cshtml";
}
@Html.Partial("_MessageAlert")
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Danh sách khách hàng</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="~/admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a>Users</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Index</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-3">
        <br />
        <a class="btn btn-success " href="@Url.Action("Create","Users")"><i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">Thêm mới</span></a>
        <a class="btn btn-danger" href="@Url.Action("Trash","Users")"><i class="fa fa-trash"></i>&nbsp;&nbsp;<span class="bold">Thùng rác(@ViewBag.demrac)</span></a>

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">

                <div class="ibox-content">

                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr>
                                <th data-toggle="true">STT</th>
                                <th>Tên người dùng</th>
                                <th>Tên truy cập</th>
                                <th>Mật khẩu</th>
                                <th data-hide="all">Email liên hệ</th>
                                <th data-hide="all">Ngày tạo</th>
                                <th data-hide="all">Số điện thoại</th>
                                <th data-hide="all">Địa chỉ</th>
                                <th>Công cụ</th>
                                <th data-toggle="true">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @{var stt = 1;}
                            @foreach (var item in Model)
                            {
                            <tr>
                                <td>@stt</td>

                                <td>
                                    <a href="@Url.Action("Details","Users", new {Id = item.ID })">@item.FullName</a>
                                </td>
                                <td>
                                    <a href="@Url.Action("Details","Users", new {Id = item.Name })">@item.Name</a>
                                </td>
                                <td>

                                    @Html.DisplayFor(modelItem => item.Password)
                                </td>
                                <td>

                                    @Html.DisplayFor(modelItem => item.Email)
</td>

                                <td>
                                    @String.Format("{0:dd:MM:yyyy -  hh:mm:ss}", item.Updated_at)
                                </td>
                                <td>

                                    @Html.DisplayFor(modelItem => item.Phone)
                                </td>
                                <td>

                                    @Html.DisplayFor(modelItem => item.Address)
                                </td>
                                <td>
                                    <label class="switch">
                                        @if (item.Status == 1)
                                        {<input class="changeStatus" data-id="@item.ID" data-controller="Users" type="checkbox" checked>}
                                        else
                                        {<input class="changeStatus" data-id="@item.ID" data-controller="Users" type="checkbox">}
                                        <span class="slider round"></span>
                                    </label>
                                    
                                    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa">
                                        <a href="@Url.Action("DelTrash", "Users", new { id = item.ID })" class="text-white"><i class="fa fa-trash"></i></a>
                                    </button>
                                </td>
                                <td>
                                    @Html.DisplayFor(modelItem => item.ID)
                                </td>
                            </tr>
                                stt++;
                            }
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination float-right"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>