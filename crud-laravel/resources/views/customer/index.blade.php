<!-- Add Customer Form -->
<div class="add-customer-form">
    <h2>නව පාරිභෝගිකයෙකු එක් කරන්න</h2>
    <form action="/customers" method="POST">
        @csrf
        <div>
            <label for="name">නම:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="address">ලිපිනය:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div>
            <label for="age">වයස:</label>
            <input type="number" id="age" name="age" required>
        </div>
        <button type="submit">එක් කරන්න</button>
    </form>
</div>

<!-- Customer Table -->
<table>
    <tr>
        <th>නම</th>
        <th>ලිපිනය</th>
        <th>වයස</th>
        <th>ක්‍රියා</th>
    </tr>
    @foreach($customers as $customer)
    <tr>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->address }}</td>
        <td>{{ $customer->age }}</td>
        <td>
            <button onclick="showEditForm({{ $customer->id }}, '{{ $customer->name }}', '{{ $customer->address }}', {{ $customer->age }})">සංස්කරණය</button>
            <form action="/customers/{{ $customer->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('ඔබට මෙම පාරිභෝගිකයා මකා දැමීමට අවශ්‍ය බව විශ්වාසද?')">මකන්න</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<!-- Edit Customer Modal -->
<div id="editModal" class="modal" style="display:none;">
    <div class="modal-content">
        <h2>පාරිභෝගික තොරතුරු සංස්කරණය</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="edit_id" name="id">
            <div>
                <label for="edit_name">නම:</label>
                <input type="text" id="edit_name" name="name" required>
            </div>
            <div>
                <label for="edit_address">ලිපිනය:</label>
                <input type="text" id="edit_address" name="address" required>
            </div>
            <div>
                <label for="edit_age">වයස:</label>
                <input type="number" id="edit_age" name="age" required>
            </div>
            <button type="submit">යාවත්කාලීන කරන්න</button>
            <button type="button" onclick="closeEditModal()">අවලංගු කරන්න</button>
        </form>
    </div>
    <button ></button>
</div>

<style>
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
}

.modal-content {
    background-color: white;
    margin: 15% auto;
    padding: 20px;
    width: 70%;
    max-width: 500px;
}

form div {
    margin-bottom: 15px;
}

label {
    display: inline-block;
    width: 100px;
}

button {
    margin: 5px;
    padding: 5px 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f4f4f4;
}
</style>

<script>
function showEditForm(id, name, address, age) {
    document.getElementById('editModal').style.display = 'block';
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_address').value = address;
    document.getElementById('edit_age').value = age;
    document.getElementById('editForm').action = `/customers/${id}`;
}

function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
}

window.onclick = function(event) {
    let modal = document.getElementById('editModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>
