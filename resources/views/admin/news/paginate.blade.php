@if($records->count()>0)
    @foreach($records as $key => $row)
    @php
    	$yeararr = array(1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December');
    @endphp
    <tr>
        <td>
            <div class="d-flex align-items-center">
                {!! $row->title !!}
            </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
                {!! $yeararr[$row->month] !!}, {!! $row->year !!}
            </div>
        </td>
        <td>
            @if($row->status == 1)
            	<a href="javascript:void(0);" onclick="changeStatus('news','{!!$row->id!!}','{!!$row->status!!}');" class="badge bg-success ">Active</a>
            @else
            	<a href="javascript:void(0);" onclick="changeStatus('news','{!!$row->id!!}','{!!$row->status!!}');" class="badge bg-danger">In-Active</a>
            @endif
        </td>
        <td>
            <span class="text-muted fw-bold text-muted d-block fs-7">{!! date('d M, Y h:i A',strtotime($row->created_at)) !!}</span>
        </td>
        <td>
            <a href="{{ url('/admin/edit-news',base64_encode($row->id)) }}" class="btn btn-sm btn-primary" title="Edit">
                <i class="bi bi-pencil"></i>
            </a>
            <a href="javascript:void(0);" onclick="deleteData('news','{{ $row->id }}');" class="btn btn-sm btn-danger" title="Delete">
                <i class="bi bi-trash"></i>
            </a>
        </td>
    </tr>
    @endforeach
    @else
    <tr>
        <td align="center" colspan="6">Record not found</td>
    </tr>
    @endif
    <tr>
        <td align="center" colspan="10">
            <div id="pagination">{{{ $records->links() }}}</div>
        </td>
    </tr>