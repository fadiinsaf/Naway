import os
import re

directories = ['artists', 'genres', 'instruments', 'maqams', 'rhythms']
base_path = '/home/fadi/Desktop/naway-dev/Naway/resources/views/admin'

for dir_name in directories:
    file_path = os.path.join(base_path, dir_name, 'index.blade.php')
    if not os.path.exists(file_path):
        continue
        
    with open(file_path, 'r') as f:
        content = f.read()
        
    # Split by Modal sections to handle Create and Edit separately
    
    # Simple regex to find labels without the red asterisk
    content = re.sub(r'<label(.*?)>([^<]+?)</label>', r'<label\1>\2 <span class="text-red-500">*</span></label>', content)
    # Cleanup double asterisks if they existed
    content = re.sub(r' <span class="text-red-500">\*</span> <span class="text-red-500">\*</span>', r' <span class="text-red-500">*</span>', content)
    
    # For Create Modal: add required to all inputs/textareas
    # Since it's tricky with regex, we can just look for all <input and <textarea that don't have required.
    # But for file inputs in edit modal, we MUST NOT add required.
    
