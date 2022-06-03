<div class="ui small modal" id="employee-modal">
  <div class="header">Add Employee</div>
  <div class="content">
    <form class="ui form" id="employee-form">
        <div class="field">
          <label>Full name:</label>
          <input type="text" id="fullname" placeholder="Ali Ata">
        </div>
        <div class="field">
          <label>Age:</label>
          <input type="text" id="age" placeholder="25">
        </div>
      <div class="field">
        <label>Salary:</label>
        <input type="text" id="salary" placeholder="9999 TL">
      </div>
      <div class="two fields">
        <div class="field">
          <label>Off day:</label>
          <input type="text" id="dayoff" placeholder=".. days">
        </div>
        <div class="field">
          <label>Contract time:</label>
          <input type="text" id="contract_time" placeholder=".. years">
        </div>
      </div>
    </form>
  </div>
  <div class="actions">
    <div id="confirm-employee" class="ui black approve button">Send</div>
    <div id="cancel-employee" class="ui white cancel button">Cancel</div>
  </div>
</div>
