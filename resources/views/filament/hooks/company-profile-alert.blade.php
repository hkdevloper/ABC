<div style="background: linear-gradient(to bottom left, #f3b441 40%, #eca524 60%);
            width: 100%;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
            transition: box-shadow 0.2s ease-in-out;
            display: flex;
            align-items: center;
            color: white;
            justify-content: center;
            @if(auth()->user()->company)
                @if(auth()->user()->company->is_approved)
                    display: none;
                @endif
            @else
                display: none;
            @endif
            gap: 0.5rem;"
     onmouseover="this.style.boxShadow = '0 6px 10px rgba(0, 0, 0, 0.15), 0 3px 6px rgba(0, 0, 0, 0.12)';"
     onmouseout="this.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08)';">
    @svg('heroicon-o-information-circle','w-10 h-10 text-red-500 dark:text-red-300')

    <div style="width: 100%;">
        <div style="margin-top: 0.5rem;">
            <span style="font-size: 1.25rem; font-weight: 600;">Pending for Approval</span>
            <br>
            <span style="font-size: 1rem;">
                Your company profile is pending for approval. Please contact the administrator for more information.
                <small style="font-size: 0.75rem; display: block;">
                    It may take 2–7 days to approve your company profile.
                </small>
            </span>
        </div>
    </div>
</div>

<!-- Company Rejected -->
<div style="background: linear-gradient(to bottom left, #f34170 40%, #ec2453 60%);
            width: 100%;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
            transition: box-shadow 0.2s ease-in-out;
            display: none;
            align-items: center;
            justify-content: center;
            color: white;
            @if(auth()->user()->company)
                @if(auth()->user()->company->is_rejected)
                    display: flex;
                @endif
            @endif
            gap: 0.5rem;"
     onmouseover="this.style.boxShadow = '0 6px 10px rgba(0, 0, 0, 0.15), 0 3px 6px rgba(0, 0, 0, 0.12)';"
     onmouseout="this.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08)';">
    @svg('heroicon-o-information-circle','w-10 h-10 text-red-500 dark:text-red-300')

    <div style="width: 100%; color: white">
        <div style="margin-top: 0.5rem;">
            <span style="font-size: 1.25rem; font-weight: 600; color: white">Company Rejected</span>
            <br>
            <span style="font-size: 1rem;">
                Your company profile is rejected. Please contact the administrator for more information.
                <!-- reason -->
                <small style="font-size: 0.75rem; display: block;">
                    Reason: {{ auth()->user()->company ? auth()->user()->company->rejected_reason : '' }}
                </small>
                <small style="font-size: 0.75rem; display: block;">
                    It may take 2–7 days to approve your company profile.
                </small>
            </span>
        </div>
    </div>
</div>
