function check_role($required_role)
{
$ci =& get_instance();
$user_role = $ci->session->userdata('role');

// Jika role tidak cocok, arahkan ke halaman akses ditolak
if ($user_role !== $required_role) {
redirect('auth/no_access');
}
}