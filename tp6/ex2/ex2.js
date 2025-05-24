document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('todo-form');
    const input = document.getElementById('todo-input');
    const list = document.getElementById('todo-list');

    form.addEventListener('submit', function (e) {
        e.preventDefault(); 

        const taskText = input.value.trim();
        if (taskText === '') return; 

        const li = document.createElement('li');
        li.className = 'todo-item';

        const span = document.createElement('span');
        span.className = 'task-text';
        span.textContent = taskText;

        const actions = document.createElement('div');
        actions.className = 'task-actions';

        const completeBtn = document.createElement('button');
        completeBtn.className = 'task-btn complete-btn';
        completeBtn.textContent = 'done';

        const deleteBtn = document.createElement('button');
        deleteBtn.className = 'task-btn delete-btn';
        deleteBtn.textContent = 'supprimer';

        
        completeBtn.addEventListener('click', () => {
            li.classList.toggle('completed');
        });

        
        deleteBtn.addEventListener('click', () => {
            list.removeChild(li);
        });

        actions.appendChild(completeBtn);
        actions.appendChild(deleteBtn);

        li.appendChild(span);
        li.appendChild(actions);

        list.appendChild(li);

        input.value = ''; 
    });
});