# 📋 Component Files Reference

## Quick Reference - All Components Created

### Layout Components (3 files)
| File | Purpose | Props |
|------|---------|-------|
| `layout/sidebar.blade.php` | Main sidebar navigation | - |
| `layout/header.blade.php` | Page header | `title` |
| `layout/user-section.blade.php` | User profile section | - |

### Navigation Components (2 files)
| File | Purpose | Props |
|------|---------|-------|
| `navigation/menu-items.blade.php` | Dynamic menu based on role | - |
| `navigation/menu-item.blade.php` | Single menu item | `route`, `label`, `routePrefix` |

### Dashboard Components (6 files)
| File | Purpose | Props |
|------|---------|-------|
| `dashboard/stat-card.blade.php` | Statistics card | `title`, `value`, `color` |
| `dashboard/stats-grid.blade.php` | Stats grid container | `cols` |
| `dashboard/table-card.blade.php` | Table wrapper | `title`, `addButtonText`, `addButtonRoute` |
| `dashboard/welcome-card.blade.php` | Welcome card | `branch` |
| `dashboard/branch-info-card.blade.php` | Branch info | `branch` |
| `dashboard/warehouse-stats.blade.php` | Warehouse stats | - |

### Common Components (2 files)
| File | Purpose | Props |
|------|---------|-------|
| `common/alert.blade.php` | Alert messages | `type`, `dismissible` |
| `common/card.blade.php` | Generic card | `title`, `padding` |

## Updated Files

### Layouts
- ✅ `resources/views/layouts/app.blade.php` - Updated to use components

### Views
- ✅ `resources/views/dashboard/cashier.blade.php`
- ✅ `resources/views/dashboard/manager.blade.php`
- ✅ `resources/views/dashboard/owner.blade.php`
- ✅ `resources/views/dashboard/supervisor.blade.php`
- ✅ `resources/views/dashboard/warehouse.blade.php`

## Component Count Summary

| Category | Count |
|----------|-------|
| Layout | 3 |
| Navigation | 2 |
| Dashboard | 6 |
| Common | 2 |
| **Total** | **13** |

## Usage Examples by Component

### Alert Component
```blade
<!-- Success -->
<x-common.alert type="success" dismissible="true">
    Operasi berhasil!
</x-common.alert>

<!-- Error -->
<x-common.alert type="error">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</x-common.alert>

<!-- Warning -->
<x-common.alert type="warning">
    Perhatian: Aksi ini tidak bisa dibatalkan!
</x-common.alert>

<!-- Info -->
<x-common.alert type="info">
    Informasi penting untuk Anda.
</x-common.alert>
```

### Card Components
```blade
<!-- Simple Card -->
<x-common.card>
    Content here
</x-common.card>

<!-- Card with Title -->
<x-common.card title="Card Title">
    Content here
</x-common.card>

<!-- Card with Custom Padding -->
<x-common.card title="Title" padding="p-8">
    More padded content
</x-common.card>
```

### Dashboard Components
```blade
<!-- Single Stat Card -->
<x-dashboard.stat-card 
    title="Total Users"
    value="1,234"
    color="blue"
/>

<!-- Stat Grid -->
<x-dashboard.stats-grid :cols="3">
    <x-dashboard.stat-card 
        title="Total" 
        value="100" 
        color="blue" 
    />
    <x-dashboard.stat-card 
        title="Active" 
        value="75" 
        color="green" 
    />
    <x-dashboard.stat-card 
        title="Inactive" 
        value="25" 
        color="red" 
    />
</x-dashboard.stats-grid>

<!-- Table Card -->
<x-dashboard.table-card 
    title="Users"
    addButtonText="Add User"
    addButtonRoute="users.create"
>
    <table class="w-full">
        <thead>
            <tr>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="px-6 py-4">{{ $user->name }}</td>
                <td class="px-6 py-4">{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-dashboard.table-card>

<!-- Welcome Card -->
<x-dashboard.welcome-card :branch="$branch" />

<!-- Branch Info Card -->
<x-dashboard.branch-info-card :branch="$branch" />
```

### Navigation Components
```blade
<!-- Menu Item -->
<x-navigation.menu-item 
    route="dashboard" 
    label="Dashboard"
    routePrefix="dashboard"
>
    <svg class="w-5 h-5"><!-- Icon --></svg>
</x-navigation.menu-item>

<!-- Menu Items Group (auto-generated based on role) -->
<x-navigation.menu-items />
```

### Layout Components
```blade
<!-- In layouts/app.blade.php -->
<x-layout.sidebar />
<x-layout.header :title="'Dashboard'" />
<x-layout.user-section />
```

## Color Options for Stat Cards
- `blue` - Blue color scheme
- `green` - Green color scheme
- `red` - Red color scheme
- `yellow` - Yellow color scheme
- `purple` - Purple color scheme

## Alert Types
- `success` - Green background, for successful operations
- `error` - Red background, for errors
- `warning` - Yellow background, for warnings
- `info` - Blue background, for information

## Integration Notes

### Role-Based Menu Items
The menu system automatically shows different items based on user role:
- **Owner** (`isOwner()`) - Full access menu
- **Manager** (`isManager()`) - Manager-specific menu
- **Cashier** (`isCashier()`) - Cashier-specific menu
- **Supervisor** (`isSupervisor()`) - Supervisor-specific menu
- **Warehouse** (`isWarehouse()`) - Warehouse-specific menu

### Data Flow from Controller to Component
```
Controller:
    return view('dashboard.cashier', [
        'branch' => $branch,
        'totalRevenue' => $totalRevenue,
    ]);

View (dashboard/cashier.blade.php):
    <x-dashboard.welcome-card :branch="$branch" />
    <x-dashboard.stat-card :value="$totalRevenue" ... />

Component (dashboard/welcome-card.blade.php):
    {{ $branch->name }}
```

## Testing Components

You can test components by creating views that use them:

```blade
<!-- test-components.blade.php -->
<div class="p-8 bg-gray-50">
    <h1 class="text-3xl font-bold mb-8">Component Test</h1>
    
    <div class="mb-8">
        <h2 class="text-2xl font-bold mb-4">Alerts</h2>
        <x-common.alert type="success">Success message</x-common.alert>
        <x-common.alert type="error">Error message</x-common.alert>
    </div>
    
    <div class="mb-8">
        <h2 class="text-2xl font-bold mb-4">Stats</h2>
        <x-dashboard.stats-grid :cols="3">
            <x-dashboard.stat-card title="Total" value="100" color="blue" />
            <x-dashboard.stat-card title="Active" value="75" color="green" />
            <x-dashboard.stat-card title="Inactive" value="25" color="red" />
        </x-dashboard.stats-grid>
    </div>
</div>
```

---

**Last Updated:** 2026-04-09  
**Component Architecture Version 1.0**
