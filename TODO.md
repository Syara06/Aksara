# TODO: Fix Pengembalian Index Error

## Plan
- [x] Analyze error root causes
- [ ] Fix PengembalianAdminController (use paginate, rename variable)
- [ ] Fix PengembalianController (rename variable for consistency)
- [ ] Fix index.blade.php (stats, relationships, routes, status field)
- [ ] Test the fix

## Root Causes
1. `->get()` returns Collection, `->total()` only works on Paginator
2. Controller passes `$pengajuan`, view expects `$pengembalian`
3. View uses `$item->peminjaman` which doesn't exist; should use direct `user()` and `book()`
4. View uses `$item->status` instead of `$item->return_status`
5. Route names mismatch (approve/reject/show vs setujui/tolak/tinjau)
6. Forms use `@method('PATCH')` but routes accept POST
7. View references non-existent columns (`tanggal_jatuh_tempo`, `denda`)

