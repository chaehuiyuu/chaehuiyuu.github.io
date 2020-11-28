package practice;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.PreparedStatement;

public class Practice {

	private static String className = "oracle.jdbc.driver.OracleDriver";
	private static String url = "jdbc:oracle:thin:@localhost:1521:xe";
	private static String user = "hr";
	private static String password = "1234";

	public Connection getConnection() {
		Connection conn = null;

		try {
			Class.forName(className);
			conn = DriverManager.getConnection(url, user, password);
			System.out.println("connection success");

		} catch (ClassNotFoundException cnfe) {
			System.out.println("failed db driver loading\n" + cnfe.toString());
		} catch (SQLException sqle) {
			System.out.println("failed db connection\n" + sqle.toString());
		} catch (Exception e) {
			System.out.println("Unknown error");
			e.printStackTrace();
		}

		return conn;
	}

	public void closeAll(Connection conn, PreparedStatement psmt, ResultSet rs) {
		try {
			if (rs != null) rs.close();
			if (psmt != null) psmt.close();
			if (conn != null) conn.close();
			System.out.println("All closed");

		} catch(SQLException sqle) {
			System.out.println("Error!!");
			sqle.printStackTrace();
		}
	}
	private void select() {
		Connection conn = null;
		PreparedStatement psmt = null;
		ResultSet rs = null;
		String sql = "select * from JOBS where job_id like '%ASST'";

		try {
			conn = getConnection();
			psmt = conn.prepareStatement(sql);
			rs = psmt.executeQuery();
			while(rs.next()){
				System.out.print("job_id : " + rs.getString("job_id"));
				System.out.print("\tjob_title : " + rs.getString("job_title"));
				System.out.println("\tmin_salary : " + rs.getString("min_salary"));
				System.out.println("\tmax_salary : " + rs.getString("max_salary"));
			}
		} catch(SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, psmt, rs);
		}
	}

	private void update() {
		Connection conn = null;
		PreparedStatement psmt = null;
		String sql = "update jobs set min_salary = 4000 where job_id = 'AD_ASST'";

		try {
			conn = this.getConnection();
			psmt = conn.prepareStatement(sql);
			int count = psmt.executeUpdate();
			System.out.println(count + "row updated");

		} catch(SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, psmt, null);
		}
	}

	private void insert() {
		Connection conn = null;
		PreparedStatement psmt = null;
		String sql = "insert into jobs values('PRG_ASST', 'ASSISTANT','3800','6000')";

		try {
			conn = this.getConnection();
			psmt = conn.prepareStatement(sql);
			int count = psmt.executeUpdate();
			System.out.println(count + "row inserted");

		} catch(SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, psmt, null);
		}
	}

	private void delete() {
		Connection conn = null;
		PreparedStatement psmt = null;
		String sql = "delete from jobs where min_salary = 3800";

		try {
			conn = this.getConnection();
			psmt = conn.prepareStatement(sql);
			int count = psmt.executeUpdate();
			System.out.println(count + "row deleted");

		} catch(SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, psmt, null);
		}
	}


		public static void main(String[] args) {

			Practice so = new Practice();
			so.select();
			so.insert();
			so.select();
			so.update();
			so.select();
			so.delete();
			so.select();


		}
}
