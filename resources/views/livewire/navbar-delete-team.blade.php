<div class="w-full px-2">
    <x-modal-confirmation buttonFullWidth title="Confirm Team Deletion?" buttonTitle="Delete Team" isErrorButton
        submitAction="delete" :actions="['The current Team will be permanently deleted.']" confirmationText="{{ $team }}"
        confirmationLabel="Please confirm the execution of the actions by entering the Team Name below"
        shortConfirmationLabel="Team Name" />
</div>
