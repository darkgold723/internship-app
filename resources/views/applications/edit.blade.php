<x-app-layout>
    <div style="padding: 40px;">
        <div style="background: white; padding: 20px; border-radius: 8px;">
            <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Edit Internship Application</h2>
            
            <form method="POST" action="{{ route('applications.update', $application) }}">
                @csrf
                @method('PUT')
                
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">Company Name</label>
                    <input type="text" name="company_name" value="{{ $application->company_name }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">Position</label>
                    <input type="text" name="position" value="{{ $application->position }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">Apply Date</label>
                    <input type="date" name="apply_date" value="{{ $application->apply_date }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">Remarks (Optional)</label>
                    <textarea name="remarks" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" rows="3">{{ $application->remarks }}</textarea>
                </div>

                <button type="submit" style="background-color: blue; color: white; padding: 12px 24px; border: none; border-radius: 5px; font-size: 16px; font-weight: bold; cursor: pointer;">
                    Update Application
                </button>
            </form>
        </div>
    </div>
</x-app-layout>