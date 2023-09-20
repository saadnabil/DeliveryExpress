<!-- Modal -->
<div class="modal complain-modal fade" id="exampleScrollableModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('translation.Complain Details') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="direction:rtl;text-align:right">
                <div class="mb-2">
                    <label style="font-weight:bold">{{ __('translation.Name')  }}: </label> <span class="name-modal "></span>
                </div>
                <div class="mb-2">
                    <label style="font-weight:bold">{{ __('translation.Email')  }}: </label> <span class="email-modal"></span>
                </div>
                <div class="mb-2">
                    <label style="font-weight:bold">{{ __('translation.Phone')  }}: </label><span class="phone-modal"></span>
                </div>
                <div class="mb-2">
                    <label style="font-weight:bold">{{ __('translation.Complain')  }}: </label> <span class="mt-2 message-modal" style="display:block;" ></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translation.Close') }}</button>
            </div>
        </div>
    </div>
</div>
