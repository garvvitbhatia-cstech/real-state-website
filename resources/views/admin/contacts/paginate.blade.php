@if($records->count()>0)
    @foreach($records as $key => $row)
    <tr>
        <td>
            <div class="d-flex align-items-center text-muted d-block fs-7" @if($row->read_status == 2) style="font-weight:bold" @endif>
                {!! $row->name !!}
            </div>
        </td>
        <td>
            <div class="d-flex align-items-center text-muted d-block fs-7" @if($row->read_status == 2) style="font-weight:bold" @endif>
                {!! $row->email !!}
            </div>
        </td>
        <td>
            <div class="d-flex align-items-center text-muted d-block fs-7" @if($row->read_status == 2) style="font-weight:bold" @endif>
                {!! $row->contact !!}
            </div>
        </td>
        <td>
            <span class="text-muted text-muted d-block fs-7" @if($row->read_status == 2) style="font-weight:bold" @endif>{!! date('d M, Y h:i A',strtotime($row->created_at)) !!}</span>
        </td>
        <td>
            <a href="{{ url('/admin/view-contact-us',base64_encode($row->id)) }}" class="btn btn-sm btn-primary" title="View">
                <i class="bi bi-eye"></i>
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