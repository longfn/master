
<div class="container-fluid pb-4">
  <p>System</p>
  <nav class="nav flex-column">
    <a href="{{ route('admin.user.index') }}" class="nav-link">User management</a>
    <a href="{{ route('admin.role.index') }}" class="nav-link">Role management</a>
    <a href="{{ route('admin.permission.index') }}" class="nav-link">Permission management</a>
    <a href="{{ route('admin.permission-group.index') }}" class="nav-link">Permission group management</a>
  </nav>
  <p>Catalog</p>
  <nav class="nav flex-column">
    <a href="{{ route('admin.product.index') }}" class="nav-link">Product management</a>
    <a href="{{ route('admin.category.index') }}" class="nav-link">Category management</a>
  </nav>
</div>

