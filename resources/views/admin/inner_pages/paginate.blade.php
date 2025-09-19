@if($records->count()>0)
	<tr>
        <td>
            <div class="d-flex align-items-center">
                0
            </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
                Index Product
            </div>
        </td>
        <td>
    		<a href="javascript:void(0);" class="badge bg-success ">Active</a>
        </td>
        <td>
            <span class="text-muted fw-bold text-muted d-block fs-7">{!! date('d M, Y h:i A',time()) !!}</span>
        </td>
        <td>
            <a href="{{ url('/admin/edit-product',base64_encode(3)) }}" class="btn btn-sm btn-primary" title="Edit">
                <i class="bi bi-pencil"></i>
            </a>
        </td>
    </tr>
    @foreach($records as $key => $row)
    <tr>
        <td>
            <div class="d-flex align-items-center">
                {!! $row->id !!}
            </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
                {!! $row->title !!}
            </div>
        </td>
        <td>
            @if($row->status == 1)
            	<a href="javascript:void(0);" onclick="changeStatus('inner_pages','{!!$row->id!!}','{!!$row->status!!}');" class="badge bg-success ">Active</a>
            @else
            	<a href="javascript:void(0);"  onclick="changeStatus('inner_pages','{!!$row->id!!}','{!!$row->status!!}');" class="badge bg-danger">In-Active</a>
            @endif
        </td>
        <td>
            <span class="text-muted fw-bold text-muted d-block fs-7">{!! date('d M, Y h:i A',strtotime($row->created_at)) !!}</span>
        </td>
        <td>
            <a href="{{ url('/admin/edit-inner-page',base64_encode($row->id)) }}" class="btn btn-sm btn-primary" title="Edit">
                <i class="bi bi-pencil"></i>
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