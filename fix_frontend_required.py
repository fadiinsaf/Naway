import re
import os

views_dir = 'resources/views/admin'
files_to_process = [
    'artists/index.blade.php',
    'instruments/index.blade.php',
    'rhythms/index.blade.php',
    'maqams/index.blade.php',
    'genres/index.blade.php',
]

for file_rel in files_to_process:
    filepath = os.path.join(views_dir, file_rel)
    if not os.path.exists(filepath):
        continue
        
    with open(filepath, 'r') as f:
        content = f.read()
        
    # We will process Create Modal and Edit Modal separately
    parts = content.split('<!-- Edit Modal -->')
    if len(parts) == 2:
        create_part = parts[0]
        edit_part = parts[1]
        
        # 1. Process Create Part (Add required to ALL inputs/textareas)
        # Find all <input ...>
        def add_req_input(m):
            tag = m.group(0)
            if 'required' not in tag and 'type="hidden"' not in tag and 'type="button"' not in tag and 'type="submit"' not in tag:
                return tag.replace('<input ', '<input required ')
            return tag
            
        create_part = re.sub(r'<input [^>]+>', add_req_input, create_part)
        
        # Find all <textarea ...>
        def add_req_textarea(m):
            tag = m.group(0)
            if 'required' not in tag:
                return tag.replace('<textarea ', '<textarea required ')
            return tag
            
        create_part = re.sub(r'<textarea [^>]+>', add_req_textarea, create_part)
        
        # Add <span class="text-red-500">*</span> to all labels in create_part
        def add_req_label(m):
            tag = m.group(0)
            if 'text-red-500' not in tag:
                # insert before </label>
                return tag.replace('</label>', ' <span class="text-red-500">*</span></label>')
            return tag
            
        create_part = re.sub(r'<label [^>]+>.*?</label>', add_req_label, create_part, flags=re.DOTALL)
        
        # 2. Process Edit Part (Add required to ALL inputs/textareas EXCEPT type="file")
        def add_req_input_edit(m):
            tag = m.group(0)
            if 'required' not in tag and 'type="hidden"' not in tag and 'type="button"' not in tag and 'type="submit"' not in tag and 'type="file"' not in tag:
                return tag.replace('<input ', '<input required ')
            return tag
            
        edit_part = re.sub(r'<input [^>]+>', add_req_input_edit, edit_part)
        edit_part = re.sub(r'<textarea [^>]+>', add_req_textarea, edit_part)
        
        # Add <span class="text-red-500">*</span> to labels EXCEPT those for file inputs (which have "Leave empty to keep current" or similar)
        def add_req_label_edit(m):
            tag = m.group(0)
            if 'text-red-500' not in tag and '(leave empty' not in tag.lower() and '(leave empty' not in tag.lower():
                return tag.replace('</label>', ' <span class="text-red-500">*</span></label>')
            return tag
            
        edit_part = re.sub(r'<label [^>]+>.*?</label>', add_req_label_edit, edit_part, flags=re.DOTALL)
        
        content = create_part + '<!-- Edit Modal -->' + edit_part
        
    with open(filepath, 'w') as f:
        f.write(content)

print("Done fixing required fields.")
