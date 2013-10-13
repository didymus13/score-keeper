<ul class="profile">
    <li><span class="label">Username:</span> <?= $this->data['User']['username'] ?></li>
    <li><span class="label">Name:</span> 
        <?= $this->data['User']['first_name'] ?> 
        <?= $this->data['User']['last_name'] ?> 
    </li>
    <li><span class="label">E-mail:</span> <?= $this->data['User']['email'] ?></li>
    <li><span class="label">Joined:</span> <?= date('Y-m-d', strtotime($this->data['User']['created'])) ?></li>
</ul>

<div class="armies">
    
</div>